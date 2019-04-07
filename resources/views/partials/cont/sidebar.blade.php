
        <!-- Sidebar -->
        <div class="bg-light border-right" id="sidebar-wrapper">
            <div class="sidebar-heading">{{ config('app.name', 'Laravel') }}</div>
            <div class="list-group list-group-flush">
                <a href="#" class="list-group-item list-group-item-action bg-light">Dashboard</a>
                @if(isset(auth()->user()->producator))
                <a href="{{ route('cont.arata.producator') }}" class="list-group-item list-group-item-action bg-light">Date Atestat</a>
                @else
                <a href="{{ route('cont.adauga.producator') }}" class="list-group-item list-group-item-action bg-light">Adauga Atestat</a>
                @endif
                @if(isset(auth()->user()->producator->companie))
                <a href="{{ route('cont.arata.companie') }}" class="list-group-item list-group-item-action bg-light">Date Companie</a>
                @else
                <a href="{{ route('cont.adauga.companie') }}" class="list-group-item list-group-item-action bg-light">Adauga Companie</a>
                @endif
                
                <a href="#" class="list-group-item list-group-item-action bg-light">Profile</a>
                <a href="#" class="list-group-item list-group-item-action bg-light">Status</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->