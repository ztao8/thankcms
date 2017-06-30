<extend name="Public:layout" />
<block name="container">
<div class="wrap J_check_wrap">
	<ul class="nav nav-tabs">
     <li class="active"><a href="{:U('role/authorize',array('id'=>$roleid))}">角色授权</a></li>
  </ul>
  <form class="J_ajaxForm" action="{:U('role/authorize')}" method="post">
    <div class="table_full">
      <table width="100%" cellspacing="0" id="dnd-example">
        <tbody>
         {$categorys}
        </tbody>
      </table>
    </div>
    <div class="form-actions">
    	<input type="hidden" name="roleid" value="{$roleid}" />
        <button class="btn btn_submit btn-primary mr10 J_ajax_submit_btn" type="submit">授权</button>
        <a class="btn" href="__URL__">返回</a>
   	</div>
  </form>
</div>
<script src="__PUBLIC__/admin/js/common.js"></script>
<script type="text/javascript">
var ajaxForm_list = $('form.J_ajaxFsorm');
if (ajaxForm_list.length) {
    Wind.use('ajaxForm', 'artDialog', function () {
        if ($.browser.msie) {
            //ie8及以下，表单中只有一个可见的input:text时，会整个页面会跳转提交
            ajaxForm_list.on('submit', function (e) {
                //表单中只有一个可见的input:text时，enter提交无效
                e.preventDefault();
            });
        }

        $('button.J_ajax_submit_btn').bind('click', function (e) {
            e.preventDefault();
            /*var btn = $(this).find('button.J_ajax_submit_btn'),
					form = $(this);*/
            var btn = $(this),
                form = btn.parents('form.J_ajaxForm');

            //批量操作 判断选项
            if (btn.data('subcheck')) {
                btn.parent().find('span').remove();
                if (form.find('input.J_check:checked').length) {
                    var msg = btn.data('msg');
                    if (msg) {
                        art.dialog({
                            id: 'warning',
                            icon: 'warning',
                            content: btn.data('msg'),
                            cancelVal: '关闭',
                            cancel: function () {
                                btn.data('subcheck', false);
                                btn.click();
                            }
                        });
                    } else {
                        btn.data('subcheck', false);
                        btn.click();
                    }

                } else {
                    $('<span class="tips_error">请至少选择一项</span>').appendTo(btn.parent()).fadeIn('fast');
                }
                return false;
            }

            //ie处理placeholder提交问题
            if ($.browser.msie) {
                form.find('[placeholder]').each(function () {
                    var input = $(this);
                    if (input.val() == input.attr('placeholder')) {
                        input.val('');
                    }
                });
            }

            form.ajaxSubmit({
                url: btn.data('action') ? btn.data('action') : form.attr('action'),
                //按钮上是否自定义提交地址(多按钮情况)
                dataType: 'json',
                beforeSubmit: function (arr, $form, options) {
                    var text = btn.text();

                    //按钮文案、状态修改
                    btn.text(text + '中...').attr('disabled', true).addClass('disabled');
                },
                success: function (data, statusText, xhr, $form) {
                    var text = btn.text();

                    //按钮文案、状态修改
                    btn.removeClass('disabled').text(text.replace('中...', '')).parent().find('span').remove();

                    if (data.state === 'success') {
                        $('<span class="tips_success">' + data.info + '</span>').appendTo(btn.parent()).fadeIn('slow').delay(1000).fadeOut(function () {
                            if (data.referer) {
                                //返回带跳转地址
                                if (window.parent.art) {
                                    //iframe弹出页
                                    window.parent.location.href = data.referer;
                                } else {
                                    window.location.href = data.referer;
                                }
                            } else {
                                if (window.parent.art) {
                                    reloadPage(window.parent);
                                } else {
                                    //刷新当前页
                                    reloadPage(window);
                                }
                            }
                        });
                    } else if (data.state === 'fail') {
                        $('<span class="tips_error">' + data.info + '</span>').appendTo(btn.parent()).fadeIn('fast');
                        btn.removeProp('disabled').removeClass('disabled');
                    }
                }
            });
        });

    });
}
$(document).ready(function () {
	Wind.css('treeTable');
    Wind.use('treeTable', function () {
        $("#dnd-example").treeTable({
            indent: 20
        });
    });
});

function checknode(obj) {
    var chk = $("input[type='checkbox']");
    var count = chk.length;
    var num = chk.index(obj);
    var level_top = level_bottom = chk.eq(num).attr('level');
    for (var i = num; i >= 0; i--) {
        var le = chk.eq(i).attr('level');
        if (eval(le) < eval(level_top)) {
            chk.eq(i).attr("checked", true);
            var level_top = level_top - 1;
        }
    }
    for (var j = num + 1; j < count; j++) {
        var le = chk.eq(j).attr('level');
        if (chk.eq(num).attr("checked") == "checked") {
            if (eval(le) > eval(level_bottom)){
            	chk.eq(j).attr("checked", true);
            }
            else if (eval(le) == eval(level_bottom)){
            	break;
            }
        } else {
            if (eval(le) > eval(level_bottom)){
            	chk.eq(j).attr("checked", false);
            }else if(eval(le) == eval(level_bottom)){
            	break;
            }
        }
    }
}
</script>
</block>