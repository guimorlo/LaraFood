<div class="m-3" style="position: absolute; min-height: 200px; right: 0; z-index: 2000; max-width: 300px;">
    <div class="card">
        <div class="card-header pb-1 pt-1 pr-2 pl-3">
            <i class="fas fa-info-circle"></i> <b>LaraFood</b> informa:
            <button class="float-right bg-transparent m-0 border-0 no-border">
                <i class="fas fa-times-circle"></i>
            </button>
        </div>
        <div class="card-body">
            <ul class="list-group">
                @foreach($errors->all() as $error)
                <li class="list-group-item ml-1 mr-1">{!! $error ?? "" !!}</li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
