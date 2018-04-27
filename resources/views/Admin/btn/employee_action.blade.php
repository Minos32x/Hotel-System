<?php if (Auth::guard('employee')->user()->id === $model->created_by || (Auth::guard('employee')->user()->type === 'admin')) { ?>
<a href ="{{ url('employees/'.$id.'/edit') }}" class="btn btn-info"><i class="fa fa-edit"></i></a>

<button class="delete btn btn-danger" id={{$id}}><i class="fa fa-trash"></i></button>

<?php } ?>


<script>
$('.delete').click(function(){
var id=$(this).prop('id');
if(confirm('are you sure?')){
$.ajax({

    url : 'employees/'+id,
    type : 'DELETE',
    datatype : 'JSON',
    data : {
        'id' : id,
        '_method' : 'DELETE',
        '_token' : '{{ csrf_token() }}'

    },
    success : function(){

        
        window.location.reload();   
    }

})

}
}
</script>
