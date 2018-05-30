<script>
    var handleGritterMessage = function () {
        @if (session('message'))
        $.gritter.add({
            title: 'message',
            text: '{{ session('message') }}'
        });
        @endif
    };

    var handleMenuTreeTable = function () {
        $('#menu').treeTable({
            theme:'vsStyle',
            expandLevel : 1,
            beforeExpand : function($treeTable, id) {
                if ($('.' + id, $treeTable).length) { return; }
                $treeTable.addChilds(html);
            },
            onSelect : function($treeTable, id) {
                window.console && console.log('onSelect:' + id);
            }
        });
    };

    var AdminMenus = function () {
        "use strict";

        return {
            index: function () {
                handleGritterMessage();
                handleMenuTreeTable();
            }
        };
    }();
</script>