@extends('layout.master')
@section('content')
@include('layout.side-bar')
<body>

    <div class="main-content">
    @include('layout.headerAdmin')
        
        <div class="main">

            <div class="cards">

                <div class="cards-single">
                    <div>
                        <h1>23</h1>
                        <span>Customers</span>
                    </div>
                    
                    <div>
                        <span class="fas fa-user"></span>
                    </div>
                </div>
                <div class="cards-single">
                    <div>
                        <h1>24</h1>
                        <span>Projects</span>
                    </div>
                    
                    <div>
                        <span class="fas fa-user"></span>
                    </div>
                </div>
                <div class="cards-single">
                    <div>
                        <h1>25</h1>
                        <span>Orders</span>
                    </div>
                    
                    <div>
                        <span class="fas fa-user"></span>
                    </div>
                </div>
                <div class="cards-single">
                    <div>
                        <h1>6k</h1>
                        <span>Income</span>
                    </div>
                    
                    <div>
                        <span class="fas fa-user"></span>
                    </div>
                </div>
            </div>

            <div class="recent-grid">

                <div class="projects">
                    <div class="card">
                        <div class="card-header">
                            <h2>Recent projects</h2>
                            <button>See all</button>
                        </div>

                        <div class="card-body">
                            <div class="table-reponsive">
                                <table width="100%">
                                    <thead>
                                        <tr>
                                            <td>Projects title</td>
                                            <td>Department</td>
                                            <td>Status</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>UI/UX Design</td>
                                            <td>UI team</td>
                                            <td>
                                                <span class="status purple"></span>
                                                review
                                            </td>
                                            
                                        </tr>
                                        <tr>
                                            <td>Web develoment</td>
                                            <td>Frontend</td>
                                            <td>
                                                <span class="status pink"></span>
                                                In progress
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Ushop app</td>
                                            <td>Mobile team</td>
                                            <td>
                                                <span class="status orange"></span>
                                                pending
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>UI/UX Design</td>
                                            <td>UI team</td>
                                            <td>
                                                <span class="status purple"></span>
                                                review
                                            </td>
                                            
                                        </tr>
                                        <tr>
                                            <td>Web develoment</td>
                                            <td>Frontend</td>
                                            <td>
                                                <span class="status pink"></span>
                                                In progress
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Ushop app</td>
                                            <td>Mobile team</td>
                                            <td>
                                                <span class="status orange"></span>
                                                pending
                                            </td>
                                        </tr><tr>
                                            <td>UI/UX Design</td>
                                            <td>UI team</td>
                                            <td>
                                                <span class="status purple"></span>
                                                review
                                            </td>
                                            
                                        </tr>
                                        <tr>
                                            <td>Web develoment</td>
                                            <td>Frontend</td>
                                            <td>
                                                <span class="status pink"></span>
                                                In progress
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Ushop app</td>
                                            <td>Mobile team</td>
                                            <td>
                                                <span class="status orange"></span>
                                                pending
                                            </td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="customers">
                    <div class="card-header">
                        <h2>New customer</h2>
                        <button>See all</button>
                    </div>

                    <div class="card-body">
                        <div class="customer">

                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
</body>

@endsection

