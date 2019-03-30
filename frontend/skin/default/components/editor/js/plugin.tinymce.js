/**
 * LiveStreet
 *
 * @license   GNU General Public License, version 2
 * @copyright 2013 OOO "ЛС-СОФТ" {@link http://livestreetcms.com}
 * @author    Denis Shakhov <denis.shakhov@gmail.com>
 */


tinymce.PluginManager.add('questions', function(editor, url) {
   
    // Ссылка на пользователя
    editor.addButton('wiki', {
        icon: 'numlist',
        tooltip: 'Вставить пункт',
        onclick: function() {
            // Open window
            editor.windowManager.open({
                title: 'Добавить пункт',
                body: [
                    { type: 'textbox', name: 'number', label: 'Номер' }
                ],
                onsubmit: function(e) {
                    editor.insertContent('<wiki punkt="' + e.data.number + '"/>');
                }
            });
        }
    });
    
    editor.on('postProcess', function(e) {
        if (e.set) {
            e.content = _code2html(e.content);
        }

        if (e.get) {
            e.content = _html2code(e.content);
        }
    });

    editor.on('beforeSetContent', function(e) {
        e.content = _code2html(e.content);
    });

    function _code2html(s) {
        s = tinymce.trim(s);

        function rep(re, str) {
            s = s.replace(re, str);
        }
        console.log(s)

        rep(/<wiki.*?punkt=\"(.*?)\".*?\/>/gi, "<a class='link'>$1</a>");

        return s;
    };

    function _html2code(s) {
        s = tinymce.trim(s);

        function rep(re, str) {
            s = s.replace(re, str);
        } console.log(s)

        rep(/<a.*?class=\"link\">(.*?)<\/a>/gi, "<wiki punkt=\"$1\" />");

        return s;
    };
});