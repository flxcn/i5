<li class="nav-item ms-5">
    <a href="/create" class="btn btn-outline-success">Add Client</a>
</li>

<form class="d-flex ms-1" style="width: 600px;" action="/search" method="get">    
    <div class="input-group">

        
        <input type="text" name="q" class="form-control bg-white" placeholder="Search the i5..." aria-label="Search the i5..." 
        
        value= @if(isset($clients))
        {{ request()->query('q'); }}
        @else {{ "" }}
    @endif
    >
        <button class="btn btn-outline-primary" type="submit">Find Client</button>
        <button type="button" class="btn btn-outline-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
            <span class="visually-hidden">Toggle Dropdown</span>
          </button>
          <ul class="dropdown-menu dropdown-menu-end">
            <li><button class="dropdown-item" type="submit" name="mode" value="name">By Name</button></li>
            <li><button class="dropdown-item" type="submit" name="mode" value="email">By Email</button></li>
            <li><button class="dropdown-item" type="submit" name="mode" value="phone">By Phone</button></li>
            {{-- by phone should strip the search term of any non-numbers then run a search of if_includes --}}
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="/clients">Most Recent</a></li>
            <li><a class="dropdown-item" href="#">Most Urgent</a></li>
          </ul>
    </div>
</form>


