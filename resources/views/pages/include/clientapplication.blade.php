    
                <form action="{{ route('clientapplications.store') }}" class="m-auto" id="services" method="POST">
                @csrf
                <div class="row mb-2">
                <div class="col-md-6">
                    <label for="first_name"></label>
                    <div class="form-group"> 
                        First Name*:
                        @if(isset($user) && isset($user->first_name))
                        <input id="first_name" name="first_name" class="form-control form-control-sm mb-2" type="text" value="{{ $user->first_name }}">
                        @else
                        <input id="first_name" name="first_name" class="form-control form-control-sm mb-2" type="text" placeholder="First Name">
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                <label for="last_name"></label>
                    <div class="form-group"> 
                        Last Name:
                        @if(isset($user) && isset($user->last_name))
                        <input id="last_name" name="last_name" class="form-control form-control-sm mb-2" type="text" value="{{ $user->last_name }}">
                        @else
                        <input id="last_name" name="last_name" class="form-control form-control-sm mb-2" type="text" placeholder="Last Name">
                        @endif                    
                        </div>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-6">
                    <label for="email"></label>
                        <div class="form-group">
                        Email*:
                        @if(isset($user) && isset($user->email))
                        <input id="email" name="email" class="form-control form-control-sm mb-2" type="email" value="{{ $user->email }}">
                        @else
                        <input id="email" name="email" class="form-control form-control-sm mb-2" type="email" placeholder="Email">
                        @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                    <label for="phone_number"></label>
                        <div class="form-group">
                        Phone Number*:
                            <input id="phone_number" name="phone_number" class="form-control form-control-sm mb-2" type="tel" maxlength="15" placeholder="Phone Number">
                        </div>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-6">
                    <label for="company_name"></label>
                    <div class="form-group">
                        Company Name:
                        <input id="company_name" name="company_name" class="form-control form-control-sm mb-2" type="text" placeholder="Company Name">
                    </div>
                </div>
                <div class="col-md-6">
                <label for="project_type"></label>
                    <div class="form-group">
                        Project Type*:
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
            <div class="row mb-2">
                <div class="col-md-6">  
                <label for="due_date"></label>  
                    <div class="form-group">
                        Project Due Date*:
                        <input type="text" class="form-control form-control-sm due-date" id="due_date"  name="due_date" placeholder="Click to open calendar">
                    </div>
                </div>
                <div class="col-md-6">    
                <label for="project_name"></label>  
                    <div class="form-group">
                        Project Name*:
                        <input type="text" class="form-control form-control-sm"  name="project_name" placeholder="Please choose a descriptive name">
                    </div>
                </div>
            </div>
            <div class="mb-2" id="wrapper">
            </div>
            <label for="project_description"></label>  
                    <div class="form-group" id="client_application">
                        <textarea id="project" name="project_description" class="form-control form-control-sm  mb-2" placeholder="A brief description of your project... is this a preexisting or new project? What are your budgetary and time constraints? Biggest challenges so far?... etc."></textarea>
                    </div>
                    <button class="btn btn-dark text-info" type="submit">Submit</button>  
    
               </form>
