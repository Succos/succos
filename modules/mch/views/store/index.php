<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<style>
    .upload-preview-img{
        width: 750px;
        height: 360px;
    }
</style>
<div class="form-group row">
    <div class="form-group-label col-2-4 text-right">
        <label class="col-form-label">图片</label>
    </div>
    <div class="col-sm-8">
        <div class="upload-group">
            <div class="input-group">
                <input class="form-control file-input" name="model[pic_url]" value="2.213ds/image/8b/8b488d14dc057e19b8a39c7c57496ded.jpg">
                <span class="input-group-btn">
                            <a class="btn btn-secondary upload-file" href="javascript:" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="上传文件" aria-describedby="tooltip455700">
                                <span class="iconfont icon-cloudupload">上传文件</span>
                            </a>
                        </span>
                <span class="input-group-btn">
                            <a class="btn btn-secondary select-file" href="javascript:" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="从文件库选择">
                                <span class="iconfont icon-viewmodule">从文件库选择</span>
                            </a>
                        </span>
                <span class="input-group-btn">
                            <a class="btn btn-secondary delete-file" href="javascript:" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="删除文件">
                                <span class="iconfont icon-close">删除文件</span>
                            </a>
                        </span>
            </div>
            <div class="upload-preview text-center upload-preview">
                <span class="upload-preview-tip">750×360</span>
                <img class="upload-preview-img" src="http://111.230.222.213/web/uploads/image/6c/6ca33817434d09eba698003223191d85.jpg">
            </div>
        </div>
    </div>
</div>
