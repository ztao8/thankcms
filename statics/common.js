var uploader;
//图片上传
function uploadImg(options) {
    // 默认设置
    var defaults = {
        "filePicker": "#filePicker",
        "preview": "#preview",
        "maxlength": 10,
        "serverurl": SITE_API_URL+"/upload/upload",
        "callback": "picUrl[]",
        "thumbWidth": 100,
        "thumbHeight": 100,
    };
    var settings = $.extend(defaults, options);
    uploader = new WebUploader.Uploader({
        auto: true,
        swf: 'plugin/webuploader/Uploader.swf',
        server: settings.serverurl,
        pick: settings.filePicker,
        fileNumLimit: settings.maxlength,
        duplicate: true,
        accept: {
            title: 'Images',
            extensions: 'gif,jpg,jpeg,bmp,png',
            mimeTypes: 'image/*'
        },
        compress: {
            width: 1200,
            height: 1200,
            // 图片质量，只有type为`image/jpeg`的时候才有效。
            quality: 70,
            // 是否允许放大，如果想要生成小图的时候不失真，此选项应该设置为false.
            allowMagnify: false,
            // 是否允许裁剪。
            crop: false,
            // 是否保留头部meta信息。
            preserveHeaders: true,
            // 如果发现压缩后文件大小比原来还大，则使用原来图片
            // 此属性可能会影响图片自动纠正功能
            noCompressIfLarger: false,
            // 单位字节，如果图片大小小于此值，不会采用压缩。
            compressSize: 0
        }
    });

    // 当有加入队列之前触发
    uploader.on('beforeFileQueued', function (file) {
        if(settings.maxlength == '1'){
            $(settings.preview).html('');
            uploader.reset();
        }
        var successNum = uploader.getStats().successNum;
        if (successNum >= settings.maxlength) {
            layer.alert('最多只能上传' + settings.maxlength + '张图片');
            return;
        }
    });

    // 当有文件添加进来的时候
    uploader.on('fileQueued', function (file) {
        var $li = $(
                '<div id="' + file.id + '" class="file-item thumbnail">' +
                '<img width="' + settings.thumbWidth + '" height="' + settings.thumbHeight + '">' +
                '<div class="info">' + file.name + '</div>' +
                '</div>'
            ), $btns = $('<div class="file-panel">' +
                '<span class="cancel">删除</span>' +
                '</div>').appendTo($li),

            $img = $li.find('img');


        // $list为容器jQuery实例
        $(settings.preview).append($li);

        // 创建缩略图
        // 如果为非图片文件，可以不用调用此方法。
        // thumbnailWidth x thumbnailHeight 为 100 x 100
        uploader.makeThumb(file, function (error, src) {
            if (error) {
                $img.replaceWith('<span>不能预览</span>');
                return;
            }
            $img.attr('src', src);
        }, settings.thumbWidth, settings.thumbHeight);

        $li.on('mouseenter', function () {
            $btns.stop().animate({height: 30});
        });

        $li.on('mouseleave', function () {
            $btns.stop().animate({height: 0});
        });

        $btns.on('click', 'span', function () {
            var index = $(this).index();
            switch (index) {
                case 0:
                    removeFile(file.id);
                    return;
            }

        });
    });
    

    // 文件上传过程中创建进度条实时显示。
    uploader.on('uploadProgress', function (file, percentage) {
        var $li = $('#' + file.id),
            $percent = $li.find('.progress span');

        // 避免重复创建
        if (!$percent.length) {
            $percent = $('<p class="progress"><span></span></p>')
                .appendTo($li)
                .find('span');
        }

        $percent.css('width', percentage * 100 + '%');
    });

    // 文件上传成功，给item添加成功class, 用样式标记上传成功。
    uploader.on('uploadSuccess', function (file, res) {
        $('#' + file.id).addClass('upload-state-done');
        if (res.status == 1) {
            $('#' + file.id).append('<input type="hidden" name="' + settings.callback + '" value="' + res.url + '">');
        } else {
            var $li = $('#' + file.id),
                $error = $li.find('div.error');
            // 避免重复创建
            if (!$error.length) {
                $error = $('<div class="error"></div>').appendTo($li);
            }
            $error.text(res.info);
        }
    });

    // 文件上传失败，显示上传出错。
    uploader.on('uploadError', function (file) {
        var $li = $('#' + file.id),
            $error = $li.find('div.error');

        // 避免重复创建
        if (!$error.length) {
            $error = $('<div class="error"></div>').appendTo($li);
        }
        $error.text('上传失败');
    });

    // 完成上传完了，成功或者失败，先删除进度条。
    uploader.on('uploadComplete', function (file) {
        $('#' + file.id).find('.progress').remove();
    });
}

function removeFile(id) {
    layer.confirm('您确定删除该图片吗？', {
        btn: ['确定', '取消'] //按钮
    }, function () {
        var $li = $('#' + id);
        $li.off().find('.file-panel').off().end().remove();
        uploader.reset();
        layer.msg('删除成功', {icon: 1});
    }, function () {
        layer.msg('取消删除');
    });
}

$(function () {
    //异步提交表单
    $('button.J_ajax_submit_btn').on('click', function (e) {
        e.preventDefault();
        var btn = $(this),
            form = btn.parents('form.J_ajaxForm');

        if(btn.data("loading")){
            return;
        }
        form.ajaxSubmit({
            url: btn.data('action') ? btn.data('action') : form.attr('action'), //按钮上是否自定义提交地址(多按钮情况)
            dataType: 'json',
            beforeSubmit: function (arr, $form, options) {

                btn.data("loading",true);
                var text = btn.text();
                //按钮文案、状态修改
                btn.text(text + ' 中...').addClass('disabled');
            },
            success: function (data, statusText, xhr, $form) {
                var text = btn.text();
                //按钮文案、状态修改
                btn.removeClass('disabled').text(text.replace(' 中...', '')).parent().find('span').remove();
                if (data.status == '1') {
                    $('<span class="tips_success">' + data.info + '</span>').appendTo(btn.parent()).fadeIn('slow').delay(1000).fadeOut(function () {
                    });
                } else if (data.status == '0') {
                    $('<span class="tips_error">' + data.info + '</span>').appendTo(btn.parent()).fadeIn('fast');
                }

                if (data.url) {
                    //返回带跳转地址
                    if(window.parent.art){
                        //iframe弹出页
                        window.parent.location.href = data.url;
                    }else{
                        window.location.href = data.url;
                    }
                } else {
                    if (data.status == '1') {
                        if(window.parent.art){
                            reloadPage(window.parent);
                        }else{
                            //刷新当前页
                            reloadPage(window);
                        }
                    }
                }

            },
            complete: function(){
                btn.data("loading",false);
            }
        });
    });
});

//iframe页面f5刷新
$(document).on('keydown', function (event) {
    var e = window.event || event;
    if (e.keyCode == 116) {
        e.keyCode = 0;
        $('.win-refresh').click();
        return false;
    }

});

//重新刷新页面，使用location.reload()有可能导致重新提交
function reloadPage(win) {
    var location = win.location;
    location.href = location.pathname + location.search;
}

//页面跳转
function redirect(url) {
    location.href = url;
}

//读取cookie
function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1, c.length);
        }
        if (c.indexOf(nameEQ) == 0) {
            return c.substring(nameEQ.length, c.length);
        }
    };

    return null;
}

//设置cookie
function setCookie(name, value, days) {
    var argc = setCookie.arguments.length;
    var argv = setCookie.arguments;
    var secure = (argc > 5) ? argv[5] : false;
    var expire = new Date();
    if(days==null || days==0) days=1;
    expire.setTime(expire.getTime() + 3600000*24*days);
    document.cookie = name + "=" + escape(value) + ("; path=/") + ((secure == true) ? "; secure" : "") + ";expires="+expire.toGMTString();
}

// 弹出iframe
function showIframe(url,title,width,height){
    layer.open({
        type: 2,
        title: title,
        shadeClose: true,
        shade: 0.8,
        area: [width, height],
        content: url,
        end: function () {
            location.reload();
        }
    });
}

//回车触发表单
$(function () {
    $('body').keydown(function () {
        var ev = window.event || arguments.callee.caller.arguments[0];
        if (ev.keyCode == 13){
            $('button.J_ajax_submit_btn').click();
        }
    })
});

//ajax删除
function J_ajax_delete(obj) {
    layer.confirm('您确定删除这条记录？', {
        btn: ['确定','取消'] //按钮
    }, function(){
        var url = $(obj).attr('url');
        $.get(url,function(data){
            if(data.status == 1){
                layer.msg(data.info, {icon: 1});
                location.href = data.url;
            }else {
                layer.msg(data.info);
            }
        });
    }, function(){
        layer.msg('取消删除');
    });
}
