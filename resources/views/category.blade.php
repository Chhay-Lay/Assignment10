<link href='{{asset("css/styles.css")}}' rel="stylesheet" />
<!-- JavaScript Bundle with Popper -->



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
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Launch demo modal
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
            <form action="{{ route('category.update', $category)}}" method="POST">
                @csrf
                @method('PATCH')
                
            </form>
            <form action="{{ route('category.destroy', $category)}}" method="POST">
                @csrf
                @method('DELETE')
                <button name="delete-button">Delete</button>
            </form>
        </div>
            
        @endforeach
    @else
        <p>There are no posts</p>
    @endif

    <script src="{{ 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js' }}" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>




