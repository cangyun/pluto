(function () {
    tinymce.create('tinymce.plugins.title', {
        init: function (ed, url) {
            ed.addButton('title', {
                title: "内容标题",
                image: url + "/images/title.png",
                onclick: function () {
                    ed.selection.setContent('[title]' + ed.selection.getContent() + '[/title]');
                }
            })
        },
        createControl: function (n, cm) {
            return null;
        }
    });
    tinymce.PluginManager.add('title',tinymce.plugins.title);
    tinymce.create('tinymce.plugins.collapse', {
        init : function(ed, url) {
            ed.addButton('collapse', {
                title : '展开收缩',
                image : url+'/images/accordion.png',
                onclick : function() {
                    ed.selection.setContent('[collapse title="标题内容"]' + ed.selection.getContent() + '[/collapse]');
                }
            });
        },
        createControl : function(n, cm) {
            return null;
        },
    });
    tinymce.PluginManager.add('collapse', tinymce.plugins.collapse);
    tinymce.create('tinymce.plugins.danger', {
        init: function (ed, url) {
            ed.addButton('danger', {
                title : '危险（重点）',
                image : url + '/images/danger.png',
                onclick : function () {
                    ed.selection.setContent('[danger]' + ed.selection.getContent() + '[/danger]');
                }
            });
        },
        createControl: function (n, cm) {
            return null;
        }
    });
})();