<script>
    var handleGritterMessage = function () {
        @if (session('message'))
        $.gritter.add({
            title: 'message',
            text: '{{ session('message') }}'
        });
        @endif
    };

    var handleIndexTableData = function () {
        $('#data-table').bootstrapTable({
            method: 'get',
            //contentType: "application/x-www-form-urlencoded",//必须要有！！！！
            url: '{{ url('admin/roles') }}',//要请求数据的文件路径
            //height:tableHeight(),//高度调整
            toolbar: '#toolbar',//指定工具栏
            striped: true, //是否显示行间隔色
            sortable:true,
            dataField: "data",//bootstrap table 可以前端分页也可以后端分页，这里
            pageNumber: 1, //初始化加载第一页，默认第一页
            pagination: true,//是否分页
            queryParamsType: 'limit',//查询参数组织方式
            // queryParams:	function(params) {
            //     return {
            //         page:params.pageNumber,
            //         limit:params.pageSize
            //     };
            // },//请求服务器时所传的参数
            sidePagination: 'server',//指定服务器端分页
            pageSize: 10,//单页记录数
            pageList: [10, 20, 30],//分页步进值
            showRefresh: true,//刷新按钮
            showColumns: true,
            search:true,
            clickToSelect: true,//是否启用点击选中行
            toolbarAlign: 'left',//工具栏对齐方式
            buttonsAlign: 'right',//按钮对齐方式
            //toolbar:'#toolbar',//指定工作栏
            showExport: true,
            exportDataType: 'all',
            columns: [
                {checkbox: true},
                {title: 'id', field: 'id', visible: true, sortable: true},
                {title: 'Name', field: 'name', sortable: true},
                {title: 'Guard', field: 'guard_name', sortable: true},
                {title: 'Created At', field: 'created_at', sortable: true},
                {title: 'Updated At', field: 'updated_at', sortable: true}
            ]
        })
    };


    var Roles = function () {
        "use strict";

        return {
            index: function () {
                handleGritterMessage();
                handleIndexTableData();
            }
        };
    }();
</script>