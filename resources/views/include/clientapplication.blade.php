                <form action="{{ route('clientapplications.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                    <div class="form-group"> 
                        <input id="name" name="name" class="form-control mb-2" type="text" placeholder="Name*">
                    </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                        <input id="company" name="company" class="form-control mb-2" type="text" placeholder="Company Name*">
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
                        <input id="email" name="email" class="form-control mb-2" type="email" placeholder="Email Address*">
                    </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                        <input id="number" name="number" class="form-control mb-2" type="tel" pattern="[1-9]{10}" maxlength="10" placeholder="Phone Number (No dashes or spaces)">
                    </div>
                    </div>
                </div>
                    <div class="form-group">
                        <select class="form-control" name="selection" id="selection">
                            <option value="Web Design/Development">Website Design/Development</option>
                            <option value="DevOps Management">DevOps</option>
                            <option value="Security Analysis">Security Analysis</option>
                            <option value="Custom Proposal">Custom Proposal</option>
                            <option value="Legacy Code">Legacy Code</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <textarea id="project" name="project" class="form-control  mb-2" placeholder="A brief description of your project..."></textarea>
                    </div>
                    <button class="btn btn-dark text-warning" type="submit">Submit</button>    
               </form>