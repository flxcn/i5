<div class="d-flex ms-5">  
    <form action="/search" method="get">  
        <div class="input-group ms-1">
            <a href="/clients/create" class="btn btn-outline-success rounded">Add&nbsp;Client</a>

            <input type="text" name="q" class="form-control bg-white ms-2 rounded-start" placeholder="Search the i5..." aria-label="Search the i5..." value= @if(isset($clients)) {{ request()->query('q'); }} @else {{ "" }} @endif>
            <button class="btn btn-outline-primary" type="submit">Find&nbsp;Client</button>
            <button type="button" class="btn btn-outline-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                <span class="visually-hidden">Toggle Dropdown</span>
            </button>
            <ul class="dropdown-menu dropdown-menu-end">
                <li><button class="dropdown-item" type="submit" name="mode" value="name">By Name</button></li>
                <li><button class="dropdown-item" type="submit" name="mode" value="email">By Email</button></li>
                <li><button class="dropdown-item" type="submit" name="mode" value="phone">By Phone</button></li>

                <li><hr class="dropdown-divider"></li>

                <li><a class="dropdown-item" href="/clients">Most Recent</a></li>
                <li><a class="dropdown-item" href="#">Most Urgent</a></li>
            </ul>
        </div>
    </form>
</div>


