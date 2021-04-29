<h1>Welcome Admin</h1>
<div class = "product-manage-container">
  <div>
    <h4>Console Items Display</h4>

    {{-- VALIDATION ERROR MESSAGES --}}
    @if($errors->any())
      @error('part_name')
      <span class = "errorSpanMsg"><small>{{$message}}</small></span>
      @enderror
      @error('part_price')
      <span class = "errorSpanMsg"><small>{{$message}}</small></span>
      @enderror
      @error('part_desc')
      <span class = "errorSpanMsg"><small>{{$message}}</small></span>
      @enderror
      @error('console_name')
      <span class = "errorSpanMsg"><small>{{$message}}</small></span>
      @enderror
      @error('console_price')
      <span class = "errorSpanMsg"><small>{{$message}}</small></span>
      @enderror
      @error('console_desc')
      <span class = "errorSpanMsg"><small>{{$message}}</small></span>
      @enderror
    @endif
    
    @if(session()->has('success'))
      <span class = "successSpanMsg"><small>{{ session()->get('success') }}</small></span>
    @endif

    <div class = "admin-btn-container">
      <button class = "btn-add-console">Add Console</button>
      <button class = "btn-add-parts">Add Parts</button>
    </div>

    {{-- @if($errors->any())
      @foreach($errors->all() as $error)
      <span class = "errorSpanMsg"><small>{{$error}}</small></span>
      @endforeach
    @endif --}}

    {{-- Consoles View Table --}}
    <div class = "display-console-container">
      <table>
        <thead>
          <tr>
            <th>Console</th>
            <th>Price</th>
            <th>Description</th>
            <th>Image</th>
            <th>Manage</th>
          </tr>
        </thead>
        <tbody>
        @foreach($consoles as $console)
          @if($console->deleted_at == NULL)
          <tr>
            <td><div class = "consoleName-{{$console->id}}">{{$console->console_name}}</div></td>
            <td><div class = "consolePrice-{{$console->id}}">{{$console->price}}</div> USD</td>
            <td><div class = "consoleDesc-{{$console->id}}">{{$console->description}}</div></td>
            <td>
              <div class = "table-image-wrapper">
                <img class = "consoleImg-{{$console->id}}" src = "{{$console->image}}"/>
              </div>
            </td>
            <td>
              <div class = "div-manage-btns">
                <button class = "btn-edit-console" data-consoleID = "{{$console->id}}">
                  <i class='fa fa-edit'></i>
                </button>
                <button class = "btn-delete-console" data-consoleID = "{{$console->id}}">
                  <i class='fa fa-trash'></i>
                </button>
              </div>
            </td>
          </tr>
          @else
          <tr class = "deletedItemRow">
            <td><div class = "consoleName-{{$console->id}}">{{$console->console_name}}</div>(deleted)</td>
            <td><div class = "consolePrice-{{$console->id}}">{{$console->price}}</div> USD</td>
            <td><div class = "consoleDesc-{{$console->id}}">{{$console->description}}</div></td>
            <td>
              <div class = "table-image-wrapper">
                <img class = "consoleImg-{{$console->id}}" src = "{{$console->image}}"/>
              </div>
            </td>
            <td>
              <div class = "div-manage-btns">
                <button class = "btn-restore-console" data-consoleID = "{{$console->id}}">
                  <i class="fa fa-undo"></i>
                </button>
              </div>
            </td>
          </tr>
          @endif
        @endforeach
        </tbody>
      </table>
    </div>

    <h4>Console Parts Display</h4>
    {{-- Parts View Table --}}
    <div class = "display-parts-container">
      {{$parts->links()}}
      <table>
        <thead>
          <tr>
            <th>Console ID / Name - Part Name</th>
            <th>Price</th>
            <th>Category ID / Name - Description</th>
            <th>Image</th>
            <th>Manage</th>
          </tr>
        </thead>
        <tbody>
        @foreach($parts as $part)
          @if($part->deleted_at == NULL)
          <tr>
            <td>
              <span class = "consoleName-{{$part->id}}">{{$part->console->id}}</span>
               / {{$part->console->console_name}} - <div class = "partName-{{$part->id}}">{{$part->part_name}}</div>
            </td>
            <td><div class = "partPrice-{{$part->id}}">{{$part->price}}</div> USD</td>
            <td>
              <span class = "partCategory-{{$part->id}}">{{$part->category->id}}</span>
              / {{$part->category->category_name}} - <div class = "partDesc-{{$part->id}}">{{$part->description}}</div>
            </td>
            <td>
              <div class = "table-image-wrapper">
                <img class = "partImg-{{$part->id}}" src = "{{$part->image}}"/>
              </div>
            </td>
            <td>
              <div class = "div-manage-btns">
                <button class = "btn-edit-part" data-partID = "{{$part->id}}">
                  <i class='fa fa-edit'></i>
                </button>
                <button class = "btn-delete-part" data-partID = "{{$part->id}}">
                  <i class='fa fa-trash'></i>
                </button>
              </div>
            </td>
          </tr>
          @else
          <tr class = "deletedItemRow">
            <td>
              <span class = "consoleName-{{$part->id}}">{{$part->console->id}}</span>
               - <div class = "partName-{{$part->id}}">{{$part->part_name}}</div> (deleted)
            </td>
            <td><div class = "partPrice-{{$part->id}}">{{$part->price}}</div> USD</td>
            <td><div class = "partDesc-{{$part->id}}">{{$part->description}}</div></td>
            <td>
              <div class = "table-image-wrapper">
                <img class = "partImg-{{$part->id}}" src = "{{$part->image}}"/>
              </div>
            </td>
            <td>
              <div class = "div-manage-btns">
                <button class = "btn-restore-part" data-partID = "{{$part->id}}">
                  <i class="fa fa-undo"></i>
                </button>
              </div>
            </td>
          </tr>
          @endif
        @endforeach
        </tbody>
      </table>
    </div>

  </div>
</div>

{{-- ADD CONSOLE ITEM MODAL --}}
<div class = "add-console-modal-container">
  <div class = "modal-content">
    <h3>Add Console Item</h3>
    <button class = "btn-close"><i class="fa fa-close"></i></button>
    <form class = "add-console-form" action = "/consoles" method = "POST">
      @csrf
      <label>Console Name</label>
      <input type ="text" name = "console_name" value="{{old('console_name')}}"/>
      <label>Price</label>
      <input type ="number" name = "console_price"/>
      <label>Product Description</label>
      <textarea name="console_desc" value="{{old('console_desc')}}"></textarea>
      <label>Input Image source</label>
      <input type ="text" name = "console_image" value="{{old('console_image')}}"/>
      <button>Add Console Item</button>
    </form>
  </div>
</div>
{{-- EDIT CONSOLE ITEM MODAL --}}
<div class = "edit-console-modal-container">
  <div class = "modal-content">
    <h3>Edit Console Item</h3>
    <button class = "btn-close-edit"><i class="fa fa-close"></i></button>
    <form class = "edit-console-form" method = "POST">
      @csrf
      @method('PUT')
      <label>Console Name</label>
      <input type ="text" name = "console_name"/>
      <label>Price</label>
      <input type ="number" name = "console_price"/>
      <label>Product Description</label>
      <textarea name="console_desc"></textarea>
      <label>Input Image source</label>
      <input type ="text" name = "console_image"/>
      <button>Save Changes</button>
    </form>
  </div>
</div>
{{-- DELETE CONSOLE ITEM MODAL --}}
<div class = "delete-console-modal-container">
  <div class = "modal-content">
    <h3>Are you sure you want to delete this item?</h3>
    <button class = "btn-close-delete"><i class="fa fa-close"></i></button>
    <form class = "delete-console-form" method = "POST">
      @csrf
      @method('DELETE')
      <button>Delete</button>
    </form>
  </div>
</div>
{{-- Restore CONSOLE ITEM MODAL --}}
<div class = "restore-console-modal-container">
  <div class = "modal-content">
    <h3>Do you want to restore this item?</h3>
    <button class = "btn-close-restore"><i class="fa fa-close"></i></button>
    <form class = "restore-console-form" method = "POST">
      @csrf
      @method('PATCH')
      <button>Restore</button>
    </form>
  </div>
</div>

{{-- PARTS ITEM MANAGEMENT --}}
{{-- ADD --}}
<div class = "add-part-modal-container">
  <div class = "modal-content">
    <h3>Add Console Parts Item</h3>
    <button class = "btn-close"><i class="fa fa-close"></i></button>
    <form class = "parts-form">
      @csrf
      <label>Part Item Name</label>
      <input type ="text" name = "part_name" value="{{old('part_name')}}"/>
      <label>Which Console</label>
      <select name = "console">
        @foreach($consoles as $console)
          <option value = "{{$console->id}}">{{$console->console_name}}</option>
        @endforeach
      </select>
      <label>Part Category</label>
      <select name = "category">
        @foreach($categories as $category)
          <option value = "{{$category->id}}">{{$category->category_name}}</option>
        @endforeach
      </select>
      <label>Price</label>
      <input type ="number" name = "part_price"/>
      <label>Product Description</label>
      <textarea name="part_desc" value="{{old('part_desc')}}"></textarea>
      <label>Input Image source</label>
      <input type ="text" name = "part_image" value="{{old('part_image')}}"/>
      <button>Add Parts</button>
    </form>
  </div>
</div>
{{-- EDIT --}}
<div class = "edit-part-modal-container">
  <div class = "modal-content">
    <h3>Edit Console Parts Item</h3>
    <button class = "btn-close"><i class="fa fa-close"></i></button>
    <form class = "parts-form" method = "POST">
      @csrf
      @method('PUT')
      <label>Part Item Name</label>
      <input type ="text" name = "part_name"/>
      <label>Which Console</label>
      <select name = "console">
        @foreach($consoles as $console)
          <option value = "{{$console->id}}">{{$console->console_name}}</option>
        @endforeach
      </select>
      <label>Part Category</label>
      <select name = "category">
        @foreach($categories as $category)
          <option value = "{{$category->id}}">{{$category->category_name}}</option>
        @endforeach
      </select>
      <label>Price</label>
      <input type ="number" name = "part_price"/>
      <label>Product Description</label>
      <textarea name="part_desc"></textarea>
      <label>Input Image source</label>
      <input type ="text" name = "part_image"/>
      <button>Save Changes</button>
    </form>
  </div>
</div>
{{-- DELETE --}}
<div class = "delete-part-modal-container">
  <div class = "modal-content">
    <h3>Are you sure you want to delete this part item?</h3>
    <button class = "btn-close"><i class="fa fa-close"></i></button>
    <form class = "parts-form" method = "POST">
      @csrf
      @method('DELETE')
      <button>Delete</button>
    </form>
  </div>
</div>
{{-- RESTORE --}}
<div class = "restore-part-modal-container">
  <div class = "modal-content">
    <h3>Do you want to restore this part item?</h3>
    <button class = "btn-close"><i class="fa fa-close"></i></button>
    <form class = "parts-form" method = "POST">
      @csrf
      @method('PATCH')
      <button>Restore</button>
    </form>
  </div>
</div>
