<?php if (Auth::guard('employee')->user()->id === $model->created_by || (Auth::guard('employee')->user()->type === 'admin')) { ?>
    <a href ="{{ url('rooms/'.$id.'/edit') }}" class="btn btn-info"><i class="fa fa-edit"></i></a>

<button class="delete btn btn-danger" id={{$id}}><i class="fa fa-trash"></i></button>

<?php } ?>
<script>
$('.delete').click(function(){
var id=$(this).prop('id');
console.log(id);
if(confirm('are you sure?')){
    console.log("asdassss");
$.ajax({

    url : 'rooms/'+id ,
    type : 'delete',
    datatype : 'JSON',
    data : {
        'id' : id,
        '_method' : 'delete',
        '_token' : '{{ csrf_token() }}'

    },
    success : function(data){
console.log("maryam");
console.log(data);
        
        // window.location.reload();   
    }

})

}
})
</script>
