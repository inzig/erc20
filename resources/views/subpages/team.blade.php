<div id="teamSection" class="row align-items-center justify-content-center mt-5">
    <div class="col-10">
            <div class="row justify-content-center mb-3 mt-5 pt-3">
                <h1 class="lato-font-regular text-center">Meet Our <strong class="lato-font-bold bitnautic-blue-text"> Team</strong></h1>
            </div>            

            @php
                $members = \BCES\Models\Member::whereTitle('Team')->get();
            @endphp
            
            <div id="devMembersContainer" class="team-portrait-grid">
                    @foreach($members as $member)
                    <div class="team-portrait-container my-2">
                        <div class="team-portrait">
                            <img src="bootstrap/img/team1.jpg" data-src="/{{$member->avatar}}" class="w-100 h-100">
                            <!-- <a class="linkedin-badge text-light" href="{{$member->linkedin}}" target="_blank"
                                rel="noreferrer"><i class="fab fa-linkedin-in fa-2x"></i></a> -->
                        </div>
                        <div class="p-1 mx-2 mt-2">
                            <!-- <h4>{{$member->name}}</h4> -->
                            <h4>Comming Soon</h4>
                        </div>
                        <div class="p-1 mx-2 my-auto">
                            <!-- <h6>{{$member->designation}}</h6> -->
                            <h6>Comming Soon</h6>
                        </div>
                    </div>
                    @endforeach


            </div>
        </div>
 </div>   

<div id="teamSection" class="row align-items-center justify-content-center mt-5">
    <div class="col-10">
            <div class="row justify-content-center mb-3 mt-5 pt-3">
                <h1 class="lato-font-regular text-center">Meet Our <strong class="lato-font-bold bitnautic-blue-text"> Advisors</strong></h1>
            </div>  

            @php
                $members = \BCES\Models\Member::whereTitle('Advisor')->get();
            @endphp
            <div id="devMembersContainer" class="team-portrait-grid">
                    @foreach($members as $member)
                    <div class="team-portrait-container my-2">
                        <div class="team-portrait">
                            <img src="bootstrap/img/team1.jpg" data-src="/{{$member->avatar}}" class="w-100 h-100">
                            <!-- <a class="linkedin-badge text-light" href="{{$member->linkedin}}" target="_blank"
                                rel="noreferrer"><i class="fab fa-linkedin-in fa-2x"></i></a> -->
                        </div>
                        <div class="p-1 mx-2 mt-2">
                            <!-- <h4>{{$member->name}}</h4> -->
                            <h4>Comming Soon</h4>
                        </div>
                        <div class="p-1 mx-2 my-auto">
                            <!-- <h6>{{$member->designation}}</h6> -->
                            <h6>Comming Soon</h6>
                        </div>
                    </div>
                    @endforeach

            </div>
        </div>
</div>
