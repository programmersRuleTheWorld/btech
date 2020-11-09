    
                <form action="{{ route('clientapplications.store') }}" id="services" method="POST">
                @csrf
                <div class="form-row">
                <div class="col-md-6">
                    <div class="form-group"> 
                        @if(isset($user) && isset($user->first_name))
                        <input id="first_name" name="first_name" class="form-control form-control-sm mb-2" type="text" value="{{ $user->first_name }}">
                        @else
                        <input id="first_name" name="first_name" class="form-control form-control-sm mb-2" type="text" placeholder="First Name*">
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group"> 
                        @if(isset($user) && isset($user->last_name))
                        <input id="last_name" name="last_name" class="form-control form-control-sm mb-2" type="text" value="{{ $user->last_name }}">
                        @else
                        <input id="last_name" name="last_name" class="form-control form-control-sm mb-2" type="text" placeholder="Last Name">
                        @endif                    
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                        @if(isset($user) && isset($user->email))
                        <input id="email" name="email" class="form-control form-control-sm mb-2" type="email" value="{{ $user->email }}">
                        @else
                        <input id="email" name="email" class="form-control form-control-sm mb-2" type="email" placeholder="Email*">
                        @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input id="phone_number" name="phone_number" class="form-control form-control-sm mb-2" type="tel" pattern="[1-9]{10}" maxlength="10" placeholder="Phone Number (Numbers only)">
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6">
                    <div class="form-group">
                        <input id="company_name" name="company_name" class="form-control form-control-sm mb-2" type="text" placeholder="Company Name*">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <select class="form-control form-control-sm" name="project_type" id="project_type">
                            <option value="Web Design/Development">Website Design/Development</option>
                            <option value="DevOps Management">DevOps</option>
                            <option value="Mobile App">Mobile App</option>
                            <option value="Security Analysis">Security Analysis</option>
                            <option value="Custom Proposal">Custom Proposal</option>
                            <option value="Legacy Code Maintenance">Legacy Code Maintenance</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6">    
                    <div class="form-group">
                        Project Due Date:
                        <input type="text" class="form-control form-control-sm" id="due-date" name="due_date" placeholder="Click to open calendar">
                    </div>
                </div>
            </div>
            <div id="wrapper">
            </div>
                    <div class="form-group" id="client_application">
                        <textarea id="project" name="project_description" class="form-control form-control-sm  mb-2" placeholder="A brief description of your project... preexisting or new site? Budgetary and time constraints? Biggest challenges so far?..."></textarea>
                    </div>
                    <button class="btn btn-dark text-info" type="submit">Submit</button>  
    
               </form>
