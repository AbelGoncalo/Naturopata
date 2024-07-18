<div wire:ignore.self data-backdrop='static' class="modal fade" id="doencaPlanta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> {{($edit != '')? 'Actualizar':'Adicionar'}} Raiz</h5>
        <button wire:click='clear'  type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form wire:submit='{{($edit != '')? 'update':'save'}}' id="basicform">
          
          <div class="form-group">
            <label for="value">Planta</label>
            <select name="planta_id" wire:model='planta_id' id="planta_id" class="form-control">
              <option value="">--Selecionar--</option>
              @if ($plantas->count() > 0)
                    @foreach ($plantas as $item)
                        <option data-id="{{$item->id}}"  value="{{$item->id}}">{{$item->planta?? ''}}</option>
                    @endforeach
              @endif
             
            </select>
            @error('planta_id') <span class="text-danger">{{$message}}</span> @enderror
          </div>


          @if ($edit == null)
            <div class="form-group">
              <label for="value">Doencas a tratar</label>
              <select multiple name="doenca_id" wire:model='doenca_id' id="doenca_id" class="form-control">
                <option  value="">--Selecionar--</option>
                  @if ($doencas->count() > 0)
                        @foreach ($doencas as $item)
                            <option data-id="{{$item->id}}"  value="{{$item->id}}">{{$item->doenca?? ''}}</option>
                        @endforeach
                  @endif
              </select>
              @error('doenca_id') <span class="text-danger">{{$message}}</span> @enderror
            </div>
          @else

            <div class="form-group">
              <label for="value">Doencas a tratar</label>
              <select name="doenca_id" wire:model='doenca_id' id="doenca_id" class="form-control">
                <option  value="">--Selecionar--</option>
                @if ($doencas->count() > 0)
                      @foreach ($doencas as $item)
                          <option data-id="{{$item->id}}"  value="{{$item->id}}">{{$item->doenca?? ''}}</option>
                      @endforeach
                @endif
              
              </select>
              @error('doenca_id') <span class="text-danger">{{$message}}</span> @enderror
            </div>
          @endif
          
      </div>

      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Salvar</button>
      </div>
    </form>
    </div>
  </div>
</div>
  