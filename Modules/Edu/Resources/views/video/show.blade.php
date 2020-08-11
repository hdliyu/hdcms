@extends('edu::layouts.front')
@section('content')
    {{-- 视频播放 --}}
    <div class="video mb-2">
        <div class="container p-0 pl-md-3 pr-md-3">
            <div class="video">
                <video controls>
                    <source src="{{ $video->path }}" type="video/mp4">
                </video>
            </div>
        </div>
    </div>
    {{-- 视频播放END --}}
    <div class="container">
        <div class="card">
            <div class="card-body row">
                <div class="col-12 col-md-7">
                    <h5 class="text-secondary"> {{$video['title']}} </h5>
                    <a href="{{route('edu.front.lesson.show',$video->lesson)}}" class="text-secondary font-weight-light"><i aria-hidden="true" class="fa fa-folder-o"></i>
                       {{$video->lesson->title}}
                    </a>
                </div>
                <div class="col-12 col-md-5 mt-2 mt-md-0 d-flex justify-content-md-end justify-content-start flex-wrap">
                    <div class="btn-group btn-group-sm align-items-center mr-1">
                        <a href="https://www.houdunren.com/Edu/video/13417" class="btn btn-outline-success">上集</a>
                        <a href="https://www.houdunren.com/Edu/video/13419" class="btn btn-outline-success">下集</a>
                    </div>
                    <div class="btn-group btn-group-sm align-items-center">
                        <a href="https://www.houdunren.com/common/favorite/Video/13418/Edu" class="btn btn-outline-secondary">
                            <i aria-hidden="true" class="fa fa-heart-o"></i> 收藏
                        </a>
                        <button type="button" class="btn btn-outline-secondary">
                            0
                        </button>
                        <a href="https://www.houdunren.com/common/favour/Video/13418/Edu" class="btn btn-outline-secondary">
                            <i aria-hidden="true" class="fa fa-thumbs-o-up"></i> 点赞
                        </a>
                        <button type="button" class="btn btn-outline-secondary">
                            2
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mb-5 mt-3">
        <div class="row">
            <div class="col-md-9 mt-2 mt-md-0 order-md-0 mb-3">
                <div id="app"><div class="comment"> <div id="commentForm"><div class="card"><div class="card-header"><!----> <span>发表评论</span></div> <div><div id="content" style="box-sizing: border-box; height: 300px;"><div class="tui-editor-defaultUI"><div class="te-toolbar-section"><div class="te-markdown-tab-section" style="display: none;"><div class="te-tab"><button type="button" data-index="0" class="te-tab-active">编辑</button><button type="button" data-index="1">预览</button></div></div><div class="tui-editor-defaultUI-toolbar"><button class="last" type="button"><i class="fa fa-arrows-alt" style="color:#666;"></i></button><button class="tui-codeblock tui-toolbar-icons" type="button"></button><div class="tui-toolbar-divider"></div><button class="tui-heading tui-toolbar-icons" type="button"></button><button class="tui-bold tui-toolbar-icons" type="button"></button><button class="tui-italic tui-toolbar-icons" type="button"></button><button class="tui-strike tui-toolbar-icons" type="button"></button><div class="tui-toolbar-divider"></div><button class="tui-hrline tui-toolbar-icons" type="button"></button><button class="tui-quote tui-toolbar-icons" type="button"></button><div class="tui-toolbar-divider"></div><button class="tui-ul tui-toolbar-icons" type="button"></button><button class="tui-ol tui-toolbar-icons" type="button"></button><button class="tui-task tui-toolbar-icons" type="button"></button><button class="tui-indent tui-toolbar-icons" type="button"></button><button class="tui-outdent tui-toolbar-icons" type="button"></button><div class="tui-toolbar-divider"></div><button class="tui-table tui-toolbar-icons" type="button"></button><button class="tui-image tui-toolbar-icons" type="button"></button><button class="tui-link tui-toolbar-icons" type="button"></button><div class="tui-toolbar-divider"></div><div class="tui-toolbar-divider" style="display: none;"></div><button class="tui-scrollsync active" type="button" style="display: none;"></button><div class="tui-popup-wrapper te-dropdown-toolbar" style="display: none;">
                                                        <div class="tui-popup-body"><div class="tui-editor-defaultUI-toolbar"></div></div></div><div class="tui-popup-wrapper te-popup-add-table" style="display: none; position: absolute; width: 181px;">
                                                        <div class="tui-popup-body">
                                                            <div class="te-table-selection">
                                                                <div class="te-table-header" style="height: 17px; width: 151px;"></div>
                                                                <div class="te-table-body" style="height: 120px; width: 151px;"></div>
                                                                <div class="te-selection-area"></div>
                                                            </div>
                                                            <p class="te-description"></p>
                                                        </div></div><div class="tui-popup-wrapper te-heading-add" style="display: none; position: absolute;">
                                                        <div class="tui-popup-body">
                                                            <ul>
                                                                <li data-value="1" data-type="Heading"><h1>标题 1</h1></li>
                                                                <li data-value="2" data-type="Heading"><h2>标题 2</h2></li>
                                                                <li data-value="3" data-type="Heading"><h3>标题 3</h3></li>
                                                                <li data-value="4" data-type="Heading"><h4>标题 4</h4></li>
                                                                <li data-value="5" data-type="Heading"><h5>标题 5</h5></li>
                                                                <li data-value="6" data-type="Heading"><h6>标题 6</h6></li>
                                                                <li data-type="Paragraph"><div>文本</div></li>
                                                            </ul>
                                                        </div></div></div></div><div class="te-editor-section"><div class="tui-editor te-ww-mode"><div class="te-md-container te-preview-style-vertical"><div class="te-editor te-tab-active"><textarea style="display: none;"></textarea><div class="CodeMirror cm-s-default CodeMirror-wrap" style="min-height: 248.003px;"><div style="overflow: hidden; position: relative; width: 3px; height: 0px;"><textarea autocorrect="off" autocapitalize="off" spellcheck="false" tabindex="0" style="position: absolute; bottom: -1em; padding: 0px; width: 1000px; height: 1em; outline: none;"></textarea></div><div class="CodeMirror-vscrollbar" tabindex="-1" cm-not-content="true"><div style="min-width: 1px;"></div></div><div class="CodeMirror-hscrollbar" tabindex="-1" cm-not-content="true"><div style="height: 100%; min-height: 1px;"></div></div><div class="CodeMirror-scrollbar-filler" cm-not-content="true"></div><div class="CodeMirror-gutter-filler" cm-not-content="true"></div><div class="CodeMirror-scroll" tabindex="-1"><div class="CodeMirror-sizer" style="margin-left: 0px;"><div style="position: relative;"><div class="CodeMirror-lines" role="presentation"><div role="presentation" style="position: relative; outline: none;"><div class="CodeMirror-measure"><pre class="CodeMirror-line-like"><span>xxxxxxxxxx</span></pre></div><div class="CodeMirror-measure"></div><div style="position: relative; z-index: 1;"></div><div class="CodeMirror-cursors"></div><div class="CodeMirror-code" role="presentation"></div></div></div></div></div><div style="position: absolute; height: 50px; width: 1px;"></div><div class="CodeMirror-gutters" style="display: none;"></div></div></div></div><div class="te-md-splitter"></div><div class="te-preview" style="min-height: 248.003px;"><div class="tui-editor-contents"></div></div></div><div class="te-ww-container"><div class="te-editor" style="position: relative;"><div contenteditable="true" class="tui-editor-contents tui-editor-contents-placeholder" style="min-height: 248.003px;"><div><br></div></div><div class="te-ww-block-overlay code-block-header" style="position: absolute; display: none; z-index: 1;"><span>text</span><button type="button">Editor</button></div></div></div></div></div><div class="te-mode-switch-section" style="display: block;"><div class="te-mode-switch"><button class="te-switch-button markdown" type="button">Markdown</button><button class="te-switch-button wysiwyg active" type="button">所见即所得</button></div></div><div class="tui-popup-wrapper te-popup-add-link tui-editor-popup" style="display: none;"><div class="tui-popup-header">
                                                    <span class="tui-popup-title">插入链接</span>
                                                    <div class="tui-popup-header-buttons">
                                                        <button type="button" class="tui-popup-close-button"></button>
                                                    </div>
                                                </div>
                                                <div class="tui-popup-body">
                                                    <label for="url">URL</label>
                                                    <input type="text" class="te-url-input">
                                                    <label for="linkText">链接文本</label>
                                                    <input type="text" class="te-link-text-input">
                                                    <div class="te-button-section">
                                                        <button type="button" class="te-ok-button">确认</button>
                                                        <button type="button" class="te-close-button">取消</button>
                                                    </div>
                                                </div></div><div class="tui-popup-wrapper te-popup-add-image tui-editor-popup" style="display: none;"><div class="tui-popup-header">
                                                    <span class="tui-popup-title">插入图片</span>
                                                    <div class="tui-popup-header-buttons">
                                                        <button type="button" class="tui-popup-close-button"></button>
                                                    </div>
                                                </div>
                                                <div class="tui-popup-body">
                                                    <div class="te-tab-section"><div class="te-tab"><button type="button" data-index="0" class="te-tab-active">文件</button><button type="button" data-index="1">URL</button></div></div>
                                                    <div class="te-url-type">
                                                        <label for="">图片网址</label>
                                                        <input type="text" class="te-image-url-input">
                                                    </div>
                                                    <div class="te-file-type te-tab-active">
                                                        <label for="">选择图片文件</label>
                                                        <input type="file" class="te-image-file-input" accept="image/*">
                                                    </div>
                                                    <label for="url">说明</label>
                                                    <input type="text" class="te-alt-text-input">
                                                    <div class="te-button-section">
                                                        <button type="button" class="te-ok-button">确认</button>
                                                        <button type="button" class="te-close-button">取消</button>
                                                    </div>
                                                </div></div><div class="tui-popup-wrapper te-popup-table-utils" style="display: none;">
                                                <div class="tui-popup-body">
                                                    <button type="button" class="te-table-add-row">添加行</button>
                                                    <button type="button" class="te-table-add-col">添加列</button>
                                                    <button type="button" class="te-table-remove-row">删除行</button>
                                                    <button type="button" class="te-table-remove-col">删除列</button>
                                                    <hr>
                                                    <button type="button" class="te-table-col-align-left">左对齐</button>
                                                    <button type="button" class="te-table-col-align-center">居中对齐</button>
                                                    <button type="button" class="te-table-col-align-right">右对齐</button>
                                                    <hr>
                                                    <button type="button" class="te-table-remove">删除表格</button>
                                                </div></div><div class="tui-popup-wrapper te-popup-code-block-languages" style="display: none; z-index: 10000;">
                                                <div class="tui-popup-body"></div></div><div class="tui-popup-modal-background tui-popup-code-block-editor" style="display: none;"><div class="tui-popup-wrapper">
                                                    <div class="tui-popup-header">
                                                        <span class="tui-popup-title">CodeBlock Editor<span class="te-input-language" style="display: none;"><input type="text" maxlength="20" placeholder="选择语言"></span></span>
                                                        <div class="tui-popup-header-buttons">
                                                            <button type="button" class="popup-editor-toggle-scroll active" style="display: inline-block;"></button>
                                                            <button type="button" class="popup-editor-toggle-preview active"></button>
                                                            <button type="button" class="popup-editor-toggle-fit"></button>
                                                            <button type="button" class="tui-popup-close-button"></button>
                                                        </div>
                                                    </div>
                                                    <div class="tui-popup-body">
                                                        <div class="popup-editor-body"><div class="tui-split-scroll scroll-sync"><div class="tui-split-scroll-wrapper"><div class="tui-split-scroll-content"><div class="popup-editor-editor-wrapper tui-split-content-left"><textarea style="display: none;"></textarea><div class="CodeMirror cm-s-default CodeMirror-wrap"><div style="overflow: hidden; position: relative; width: 3px; height: 0px;"><textarea autocorrect="off" autocapitalize="off" spellcheck="false" tabindex="0" style="position: absolute; bottom: -1em; padding: 0px; width: 1000px; height: 1em; outline: none;"></textarea></div><div class="CodeMirror-vscrollbar" tabindex="-1" cm-not-content="true"><div style="min-width: 1px;"></div></div><div class="CodeMirror-hscrollbar" tabindex="-1" cm-not-content="true"><div style="height: 100%; min-height: 1px;"></div></div><div class="CodeMirror-scrollbar-filler" cm-not-content="true"></div><div class="CodeMirror-gutter-filler" cm-not-content="true"></div><div class="CodeMirror-scroll" tabindex="-1"><div class="CodeMirror-sizer" style="margin-left: 0px;"><div style="position: relative;"><div class="CodeMirror-lines" role="presentation"><div role="presentation" style="position: relative; outline: none;"><div class="CodeMirror-measure"><pre class="CodeMirror-line-like"><span>xxxxxxxxxx</span></pre></div><div class="CodeMirror-measure"></div><div style="position: relative; z-index: 1;"></div><div class="CodeMirror-cursors"></div><div class="CodeMirror-code" role="presentation"></div></div></div></div></div><div style="position: absolute; height: 50px; width: 1px;"></div><div class="CodeMirror-gutters" style="display: none;"></div></div></div></div><div class="tui-split-content-right" style="top: 0px;"><div class="tui-editor-contents"></div></div></div><div class="tui-splitter"></div></div></div></div>
                                                        <div class="te-button-section">
                                                            <button type="button" class="te-ok-button">确认</button>
                                                            <button type="button" class="te-close-button">取消</button>
                                                        </div>
                                                    </div>
                                                </div></div></div></div> <div class="text-secondary mt-2 p-2 d-block mb-2"><i class="fas fa-info-circle"></i> 你可以在编辑器底部切换为markdown模式，编辑器也支持托放上传图片。</div></div> <div class="card-footer text-muted"><button type="button" class="btn btn-primary btn-sm d-inline-block">保存</button> <!----></div></div> <!----></div> <div class="el-backtop" style="right: 40px; bottom: 40px;"><i class="el-icon-caret-top"></i></div></div></div>
            </div>
            <div class="col-md-3 pl-md-0 order-0 order-md-1">
                <div class="card text-secondary">
                    <div class="card-header bg-white">课程列表</div>
                    <div class="list-group list-group-flush">
                        @foreach($video->lesson->videos as $video)
                        <a href="{{route('edu.front.video.show',$video)}}"class="list-group-item text-secondary">{{$video['title']}}</a>
                   @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
