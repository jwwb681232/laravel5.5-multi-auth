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

    var handleIcon = function(){
        $('#icon').change(function(){
            var icon = $(this).val();
            var iconNode = $(this).prev().children('i');
            if(!icon){
                iconNode.attr('class','fa fa-frown-o');
            }else{
                iconNode.attr('class',icon);
            }
            //$(this).prev().children('i').attr('class',$(this).val())
        });
    };

    var AdminMenus = function () {
        "use strict";

        return {
            index: function () {
                handleGritterMessage();
                handleMenuTreeTable();
            },
            create:function(){
                handleIcon();
            }
        };
    }();
</script>