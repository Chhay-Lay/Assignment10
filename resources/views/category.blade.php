<link href='{{asset("css/styles.css")}}' rel="stylesheet" />

<form action="{{ route('category')}}" method="POST">
    @csrf
    <textarea name="category_name" cols="30" rows="10"></textarea>
    <button type="submit">Add more category</button>
</form>

@if ($categories->count ())
        @foreach ($categories as $category)
        <div id="Category">
            <h4>
                {{ $category->category_name }}
            </h4>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary mx-1" data-toggle="modal" data-target="#exampleModal">
                Edit
            </button>
            
            <!-- Modal -->
            <div class="modal fade mx-1" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <form action="{{ route('category.update', $category->id)}}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="modal-body">
                            <textarea name="Edit_category" cols="30" rows="10"></textarea>
                            
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                        
                    </form>
                    </div>
                </div>
                </div>
            </div>
            <form action="{{ route('category.destroy', $category->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button name="delete-button" class="btn btn-primary">Delete</button>
            </form>
        </div>
            
        @endforeach
    @else
        <p>There are no category</p>
    @endif

    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>




