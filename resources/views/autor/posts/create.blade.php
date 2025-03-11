<!-- Modal -->
<form action="{{ route('autor.posts.store') }}" method="post">
    @csrf
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Agrega el nuevo titulo de tu Publicacion</h4>
          </div>
          <div class="modal-body">
            <div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
              {{-- <label >titulo de la publicacion</label> --}}
              <input value="{{ old('title')}}" class="form-control" name="title" placeholder="ingresa el titulo" >
              {!! $errors->first('title', '<span class="help-block">:message</span>')!!}
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button  class="btn btn-primary">Crear Publicacion</button>
          </div>
        </div>
      </div>
    </div>
</form>