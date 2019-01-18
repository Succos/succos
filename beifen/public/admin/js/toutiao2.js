function GetRandomNum(Min, Max)
{
    var Range = Max - Min;
    var Rand = Math.random();
    return(Min + Math.round(Rand * Range));
}
function showhide(type, obj) {
    if (type == 1) {
        $("#jq_yulang_setting").hide();
        $("#jq_duanluo_setting").hide();
        $("#jq_title_setting").show(200);
        var title = !$("#title").val() ? '' : $("#title").val();
        var nav_id = !$("#nav_id").val() ? 0 : $("#nav_id").val();
        var author = !$("#author").val() ? '' : $("#author").val();
        $("#titleadd").val(title);
        $("#navadd").val(nav_id);
        $("#authoradd").val(author);
    }
    //预览显示
    if (type == 2) {
        $("#jq_duanluo_setting").hide();
        $("#jq_title_setting").hide();
        $("#jq_yulang_setting").show(200);

        var title = !$("#title").val() ? '暂无设置标题' : $("#title").val();
        var author = !$("#author").val() ? '你猜猜猜' : $("#author").val();
        var add_time = day;
        var contentdata = [];
        $(".duanluo .jq_item").each(function () {
            var id = $(this).attr('data-id');
            var pic = $("#dl_photo_" + id).val();
            var content = $("#dl_content_" + id).val();
            if (pic || content) {
                contentdata.push({
                    pic: pic ? pic : '',
                    content: content ? content : ''
                });
            }
        });

        var json = {
            title: title,
            author: author,
            add_time: day,
            contentdata: contentdata
        };
        //console.log(contentdata);
        var gettpl = document.getElementById('yltpl').innerHTML;
        laytpl(gettpl).render(json, function (html) {
            $("#jq_yulang_setting").html(html);
        });

    }
    if (type == 3) { //段落
        $("#jq_yulang_setting").hide();
        $("#jq_title_setting").hide();
        $("#jq_duanluo_setting").show(200);
        var id = obj.attr('data-id');
        var photo = !$("#dl_photo_" + id).val() ? '' : $("#dl_photo_" + id).val();
        var content = !$("#dl_content_" + id).val() ? '' : $("#dl_content_" + id).val();
        console.log(photo);
        $("#dlcontent").val(content);
        $("#dlphoto").val(photo);
        $("#dl_show_photo").attr('src', photo == '' ? '/public/admin/img/add_img.png' : imgurl + photo);

        $("#jq_dlsetting").unbind('click');
        $("#jq_dlsetting").click(function () {
            var content1 = !$("#dlcontent").val() ? '' : $("#dlcontent").val();
            var photo1 = !$("#dlphoto").val() ? '' : $("#dlphoto").val();
            if (!content1 && !photo1) {
                layer.msg('内容和图片不能同时为空！');
            }
            $("#dl_photo_" + id).val(photo1);
            $("#dl_content_" + id).val(content1);
            photo1 = photo1 == '' ? '/public/admin/img/wenben.png' : imgurl + photo1;
            $("#dl_show_pic_" + id).attr('src', photo1);
            $("#dl_show_content_" + id).text(content1);
            showhide(2);
        });

    }
}

function ajaxupload() {
    $("#file").unbind();
    $("#file").change(function () { //上传图片 
        $.ajaxFileUpload({
            type: 'POST',
            url: uploadUrl,
            fileElementId: 'file', //与html代码中的input的id值对应  
            dataType: 'html',
            success: function (data, status) {
                var gettpl = document.getElementById('imgitemtpl').innerHTML;
                laytpl(gettpl).render({img: data}, function (html) {
                    $(".jq_photolist").append(html);
                });
                ajaxupload();
            },
            error: function (data, status, e) {
                ajaxupload();
            }
        });
    });
}
$(document).ready(function (e) {
    $(".duanluo").sortable({
        revert: true
    });
    $(".duanluo .item").disableSelection();
    ajaxupload();

    //新增段落点击
    $(".jq_dl_add").click(function () {
        var id = GetRandomNum(100000, 999999);
        var gettpl = document.getElementById('dlitemtpl').innerHTML;
        laytpl(gettpl).render({id: id}, function (html) {
            $(".duanluo").append(html);
        });
        $(".duanluo").sortable({
            revert: true
        });
        $(".duanluo .item").disableSelection();
    });

    $(document).on('click', '.jq_delete_dl', function () {
        $(this).parent().remove();
        showhide(2);
    });
    $(document).on('click', '.duanluo .jq_item', function () {
        showhide(3, $(this));
    });
    $(".jq_yl_show").click(function () {
        showhide(2);
    });
    $("#jq_title").click(function () {
        showhide(1);
    });

    $("#jq_shezhi").click(function (e) {
        if (!$("#titleadd").val()) {
            layer.msg("标题不能为空！");
        } else {
            layer.msg("设置成功，可以添加段落了！");
            $("#jq_title").html($("#titleadd").val());
            $("#title").val($("#titleadd").val());
            $("#nav_id").val($("#navadd").val());
            $("#author").val($("#authoradd").val());
            showhide(2);
        }
    });

    $("#show_pic1").click(function (e) {
        if (!$("#show_pic1").find('input').val()) {
            $(".photolist").show();
            $(".jq_photolist").attr('data-type',1);
        } else {
            layer.confirm("您确定删除该图片么", {
                btn: ['确定', '取消'] //按钮
            }, function () {
                layer.closeAll();//关闭所有的窗口
                $("#show_pic1").find('img').attr('src', '/public/admin/img/add_img.png');
                $("#show_pic1").find('input').val('');
            });
        }
    });
    $(document).on("click", '.jq_yes_imgitem', function () {
        $(".photolist").hide();
        var photo = $(this).attr('data-photo');
        var imgtype =  $(".jq_photolist").attr('data-type');
        if (imgtype == 1) {
            $("#show_pic1").find('img').attr('src', imgurl + photo);
            $("#show_pic1").find('input').val(photo);
        }
        if (imgtype == 2) {
            $("#dl_show_photo").attr('src', imgurl + photo);
            $("#dlphoto").val(photo);
        }
        if (imgtype == 3) {
            $("#show_pic2").find('img').attr('src', imgurl + photo);
            $("#show_pic2").find('input').val(photo);
        }
        if (imgtype == 4) {
            $("#show_pic3").find('img').attr('src', imgurl + photo);
            $("#show_pic3").find('input').val(photo);
        }

    });

    $("#dl_show_photo").click(function (e) {
        if ($("#dl_show_photo").attr('src') == '/public/admin/img/add_img.png') {
            $(".photolist").show();
            $(".jq_photolist").attr('data-type',2);
        } else {
            layer.confirm("您确定删除该图片么", {
                btn: ['确定', '取消'] //按钮
            }, function () {
                layer.closeAll();//关闭所有的窗口
                $("#dl_show_photo").attr('src', '/public/admin/img/add_img.png');
                $("#dlphoto").val('');
            });
        }
    });
    $("#show_pic2").click(function (e) {
        if (!$("#show_pic2").find('input').val()) {
            $(".photolist").show();
            $(".jq_photolist").attr('data-type',3);
         } else {
            layer.confirm("您确定删除该图片么", {
                btn: ['确定', '取消'] //按钮
            }, function () {
                layer.closeAll();//关闭所有的窗口
                $("#show_pic2").find('img').attr('src', '/public/admin/img/add_img.png');
                $("#show_pic2").find('input').val('');
            });
        }
    });

    $("#show_pic3").click(function (e) {
        if (!$("#show_pic3").find('input').val()) {
            $(".photolist").show();
             $(".jq_photolist").attr('data-type',4);
        } else {
            layer.confirm("您确定删除该图片么", {
                btn: ['确定', '取消'] //按钮
            }, function () {
                layer.closeAll();//关闭所有的窗口
                $("#show_pic3").find('img').attr('src', '/public/admin/img/add_img.png');
                $("#show_pic3").find('input').val('');
            });
        }
    });


    $(document).on("click", '.jq_delete_imgitem', function () {
        var obj = $(this).parent().parent();
        layer.confirm("您确定删除该图片么", {
            btn: ['确定', '取消'] //按钮
        }, function () {
            layer.closeAll();//关闭所有的窗口
            obj.remove();
        });
    });


});
    