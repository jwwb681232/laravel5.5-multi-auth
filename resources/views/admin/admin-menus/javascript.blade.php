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

    var handleSelect2 = function () {
        $("#parent_id_select").select2();
        $("#permission_id_select").select2();
    };

    var handleDestroy = function () {
        $(document).on('click', '.destroy', function () {
            var _delete_id = $(this).attr('data-id');
            swal({
                    title: "Are you sure you want to delete this record?",
                    text: "It will not be restored after deletion. Please exercise caution!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "OK",
                    cancelButtonText: "Cancel",
                    closeOnConfirm: false
                },
                function () {
                    $('form[name=delete_item_' + _delete_id + ']').submit();
                }
            );
        });
    };

    var AdminMenus = function () {
        "use strict";

        return {
            index: function () {
                handleGritterMessage();
                handleMenuTreeTable();
                handleDestroy();
            },
            create:function(){
                handleIcon();
                handleSelect2();
            },
            edit:function(){
                handleIcon();
                handleSelect2();
            }
        };
    }();
</script>