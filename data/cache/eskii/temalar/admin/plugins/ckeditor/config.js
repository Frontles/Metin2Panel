/**
 * @license Copyright (c) 2003-2016, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function(config) {
    // Define changes to default configuration here.
    // For complete reference see:
    // http://docs.ckeditor.com/#!/api/CKEDITOR.config

    // The toolbar groups arrangement, optimized for two toolbar rows.

    config.extraAllowedContent = 'span(*)';
    config.toolbar      = 'editor';
    config.font_style   = {
        element: 'body',
        styles: {
            'font-family': '#(verdana)'
        },
        overrides: [{
            element: 'font',
            attributes: {
                'face': null
            }
        }]
    };

    // config.tabIndex = 3;
    config.tabSpaces                                  = 12;
    config.language                                   = 'tr';
    config.width                                      = '100%';
    //config.width                                      = '595px';
    config.height                                     = '400px';
    config.extraPlugins                               = 'autogrow,wordcount,notification,justify';
    config.autoGrow_onStartup                         = true;
    config.autoGrow_minHeight                         = 400;
    config.fillEmptyBlocks                            = false;
    config.forcePasteAsPlainText                      = true;
    config.resize_enabled                             = false,
    config.enterMode                                  = CKEDITOR.ENTER_P;
    config.shiftEnterMode                             = 2; // 1 = <P>, 2= <BR>, 3 = <DIV>
    config.skin                                       = 'bootstrapck';
    config.disableNativeSpellChecker                  = false;
    config.entities_latin                             = true;
    config.htmlEncodeOutput                           = false;
    config.entities                                   = false;
    config.fontSize_defaultLabel                      = '18px';
    config.wordcount = {
        // Whether or not you want to show the Paragraphs Count
        showParagraphs: true,

        // Whether or not you want to show the Word Count
        showWordCount: true,

        // Whether or not you want to show the Char Count
        showCharCount: true,

        // Whether or not you want to count Spaces as Chars
        countSpacesAsChars: false,

        // Whether or not to include Html chars in the Char Count
        countHTML: false,

        // Maximum allowed Word Count, -1 is default for unlimited
        maxWordCount: -1,

        // Maximum allowed Char Count, -1 is default for unlimited
        maxCharCount: -1,

        // Add filter to add or remove element before counting (see CKEDITOR.htmlParser.filter), Default value : null (no filter)
        filter: new CKEDITOR.htmlParser.filter({
            elements: {
                div: function(element) {
                    if (element.attributes.class == 'mediaembed') {
                        return false;
                    }
                }
            }
        })
    };

    config.toolbar_editor = [{
        name: 'basicstyles',
        items: ['Bold', 'Italic','Underline','-','RemoveFormat']
    }, {
        name: 'clipboard',
        items: ['PasteFromWord', 'Undo', 'Redo']
    }, {
        name: 'links',
        items: ['Link', 'Unlink']
    }, {
        name: 'paragraph',
        items: ['align', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock']
    }, {
        name: 'document',
        items: ['Source']
    }, {
        name: 'insert',
        items: ['Image']
    }];


    config.toolbar_full =
    [
        ['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],
        ['NumberedList','BulletedList','-','Outdent','Indent','Blockquote'],
        ['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
        ['Link','Unlink','Anchor'],
        ['Image','Flash','Table','HorizontalRule','Smiley','SpecialChar'],
        '/',
        ['Cut','Copy','Paste','PasteText','PasteFromWord','-','Print', 'SpellChecker', 'Scayt'],
        ['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],
        ['Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField'],
        ['Styles','Format','Font','FontSize'],
        ['TextColor','BGColor'],
        ['Source', 'ShowBlocks']
    ];

};