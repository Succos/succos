
//前台引用的时候需要重写 AJAXLOGIN 函数
function ajaxLogin() {
    return null;
}

function showdata(data){
    layer.closeAll();
    $("#"+data.show_id).val(data.id);
    $("#"+data.show_text).val(data.text);
}


function respond(data) {
    layer.closeAll();
    if (data.code == 1) {
        var url = data.url;
        var status = data.data;
        layer.msg(data.msg, {time: data.wait * 1000}, function () {
            if (status == 100) {
                window.parent.location.reload(true);
            } else {
                if (url) {
                    location.href = url;
                } else {
                    window.location.reload(true);
                }
            }
        });
    } else {
        switch (data.data) {
            case 101:
                layer.msg(data.msg);
                break;
            case 102:
                for (a in data.msg) {
                    layer.tips(data.msg[a], '#' + a, {tipsMore: true, tips: [3, '#78BA32']});
                }
                break;
            case 201:
                ajaxLogin();
                break;
            default:
                layer.msg(data.msg);
                break;
        }
    }
}

$(document).ready(function (e) {
    $.ajaxSetup({cache: false});
    $(document).on('click', "*[mini='act']", function (e) {
        var miniAct = $(this);
        var href = $(this).attr('href');
        e.preventDefault();
        var str = '';
        if ($(this).attr('title')) {
            str = $(this).attr('title');
        } else {
            str = '您确定要执行该操作？'
        }

        layer.confirm(str, {
            btn: ['确定', '取消'] //按钮
        }, function () {
            layer.closeAll();//关闭所有的窗口

            if (miniAct.attr('lock') != 1) {
                miniAct.attr('lock', 1);
                layer.load(1);
                $.get(href, function (data) {
                    miniAct.attr('lock', 0);
                    respond(data);
                }, 'json');
            }
        });
    });


    $(document).on('click', "*[mini='list']", function (e) {
        var miniList = $(this);
        var href = $(this).attr('href');
        var forId = $(this).attr('for');

        e.preventDefault();
        var str = '';
        if ($(this).attr('title')) {
            str = $(this).attr('title');
        } else {
            str = '您确定要执行该操作？'
        }
        layer.confirm(str, {
            btn: ['确定', '取消'] //按钮
        }, function () {
            layer.closeAll();//关闭所有的窗口
            if (miniList.attr('lock') != 1) {
                miniList.attr('lock', 1);
                layer.load(1);
                $.post(href, $("#" + forId).serialize(), function (data) {
                    miniList.attr('lock', 0);
                    respond(data);
                }, 'json');
            }
        });
    });



    //使用异步提交的话
    $(document).on('click', "*[mini='submit']", function (e) {
        e.preventDefault();
        var miniSubmit = $(this);
        var forId = miniSubmit.attr('for');
        if (forId) {
            var form = $("#" + forId);
        } else {
            var form = $('form');
        }
        if (miniSubmit.attr('lock') != 1) {
            miniSubmit.attr('lock', 1);
           layer.load(1);
            $.post(form.attr('action'), form.serialize(), function (data) {
                miniSubmit.attr('lock', 0);
                respond(data);
            }, 'json');
        }
    });

	
	
    //使用异步提交的话
    $(document).on('click', "*[mini='submit2']", function (e) {
        e.preventDefault();
        var miniSubmit = $(this);
        var forId = miniSubmit.attr('for');
		var form;
        if (forId) {
             form = $("#" + forId);
        } else {
             form = $('form');
        }
        if (miniSubmit.attr('lock') != 1) {
            miniSubmit.attr('lock', 1);
           layer.load(1);
		   //alert(form.serialize());
		   //return;
            $.post(form.attr('action'), form.serialize(), function (data) {
                miniSubmit.attr('lock', 0);
                respond(data);
            }, 'json');
        }
    });
	
	
    $(document).on('click', "*[mini='load']", function (e) {
        var href = $(this).attr('href');
        var title = $(this).attr('title');
        var w = $(this).attr('w');
        var h = $(this).attr('h');
        e.preventDefault();
        layer.open({
            type: 2,
            title: title,
            maxmin: true, //开启最大化最小化按钮
            area: [w, h],
            content: href
        });
    });
    $('table th input:checkbox').on('click', function () {
        var that = this;
        $(this).closest('table').find('tr > td:first-child input:checkbox')
            .each(function () {
                this.checked = that.checked;
                $(this).closest('tr').toggleClass('selected');
            });
    });
});

$(".pagination li a").click(function () {
    alert(1);
    $('.form-search').submit();
})
