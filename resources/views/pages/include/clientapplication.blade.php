    
                <form action="{{ route('clientapplications.store') }}" method="POST">
                @csrf
                <div class="form-row">
                    <div class="col-md-6">
                    <div class="form-group"> 
                        <input id="first_name" name="first_name" class="form-control form-control-sm mb-2" type="text" placeholder="First Name*">
                    </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group"> 
                        <input id="last_name" name="last_name" class="form-control form-control-sm mb-2" type="text" placeholder="Last Name">
                    </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6">
                    <div class="form-group">
                        <input id="email" name="email" class="form-control form-control-sm mb-2" type="email" placeholder="Email Address*">
                    </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                        <input id="number" name="phone_number" class="form-control form-control-sm mb-2" type="tel" pattern="[1-9]{10}" maxlength="10" placeholder="Phone Number (Numbers only)">
                    </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6">
                    <div class="form-group">
                        <input id="company" name="company" class="form-control form-control-sm mb-2" type="text" placeholder="Company Name*">
                    </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                        <select class="form-control form-control-sm" name="project_type" id="selection">
                            <option value="Web Design/Development">Website Design/Development</option>
                            <option value="DevOps Management">DevOps</option>
                            <option value="Mobile App">Mobile App</option>
                            <option value="Security Analysis">Security Analysis</option>
                            <option value="Custom Proposal">Custom Proposal</option>
                            <option value="Legacy Code">Legacy Code</option>
                        </select>
                    </div>
                    </div>
                </div>
                    <div class="form-group">
                        <textarea id="project" name="project_description" class="form-control form-control-sm  mb-2" placeholder="A brief description of your project... preexisting or new site? Budgetary and time constraints? Biggest challenges so far?..."></textarea>
                    </div>
                    <button class="btn btn-dark text-info" type="submit">Submit</button>  
                    
               </form>