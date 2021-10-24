<form action="{{ route('contactus.store') }}" method="POST">
@csrf
    <div class="col-md-6 m-auto">
        <div class="card bg-info">
            <div class="card-header text-center">
                <h3>Contact Us</h3>
            </div>
            <div class="card-body">
                <div class="card bg-info">
                    <div class="card-body">
                    If you have comments, questions, suggestions, or concerns, please contact us using the
                    form below; the appropriate division will receive your query and respond as 
                    soon as possible. We appreciate your feedback!
                    </div>
                </div>
            <div class="row mb-2">
                <div class="col-md">
                    <div class="form-group text-center">
                        <label for="name"></label>
                        <input id="name" name="name" class="form-control form-control-sm mb-2" placeholder="Name...">
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-group text-center">
                        <label for="phone_number"></label>
                        <input id="phone_number" name="phone_number" class="form-control form-control-sm mb-2" placeholder="Phone Number...">
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-group text-center">
                        <label for="email"></label>
                        <input id="email" name="email" class="form-control form-control-sm mb-2" placeholder="Email Address...">
                    </div>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-md">
                    <div class="form-group text-center">
                        <label for="body"></label>
                        <textarea id="body" name="body" class="form-control form-control-sm mb-2" placeholder="Body..."></textarea>
                    </div>
                </div>
            </div>
            <button class="btn btn-dark text-info" type="submit">Submit</button>
        </div>
    </div>
</form>