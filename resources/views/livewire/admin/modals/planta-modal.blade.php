<div wire:ignore.self data-backdrop='static' class="modal fade" id="planta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> {{($edit != '')? 'Actualizar':'Adicionar'}} Categoria</h5>
        <button wire:click='clear'  type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form wire:submit='{{($edit != '')? 'update':'save'}}' id="basicform">
          <div class="form-group">
            <label for="planta">Planta</label>
            <input id="planta" type="text" wire:model='planta' description="planta" placeholder="nome a planta" autocomplete="on" class="form-control">
            @error('planta') <span class="text-danger">{{$message}}</span> @enderror
        </div>

       
        <div class="form-group">
            <label for="descricao">Descrição</label>
            <input id="descricao" type="text" wire:model='descricao' description="descricao" placeholder="Descreve a planta" autocomplete="on" class="form-control">
            @error('descricao') <span class="text-danger">{{$message}}</span> @enderror

        </div>
           
          <div x-data="{isUploading: false, progress: 0}" class="form-group"
            x-on:livewire-upload-start = "isUploading = true"
            x-on:livewire-upload-finish = "isUploading = false"
            x-on:livewire-upload-error = "isUploading = false"
            x-on:livewire-upload-progress = "progress = $event.detail.progress"
            >
            <label for="imagem">Imagem</label>
            <input accept="png,gif,jpeg,jpg"  id="imagem" type="file" wire:model='imagem' description="image" class="form-control w-100">
            @error('imagem') <span class="text-danger">{{$message}}</span> @enderror
            <div x-show="isUploading" class="progress progress-striped active w-100 mt-3" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="10">
              <div class="progress-bar progress-bar-success" x-bind:style="`width:${progress}%`" data-dz-uploadprogress></div>
            </div>
          </div>
          
          
          <div class="form-group">
            @if ($edit != null)
                
            <p>Imagem Actual</p>
            <img class="img-fluid rounded" style="width: 100%;height:8rem; object-fit:cover" src="{{($edit != null) ? asset('storage/plantas/'.$imagem):''}}" alt="Imagem da planta {{$planta}}">
            @endif
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Salvar</button>
      </div>
    </form>
    </div>
  </div>
</div>
  