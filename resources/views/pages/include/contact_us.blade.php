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
                    <div class="form-group text-left">
                        <label for="name"></label>
                        Name:
                        <input id="name" name="name" class="form-control form-control-sm mb-2" placeholder="Name...">
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-group text-left">
                        <label for="phone_number"></label>
                        Phone Number:
                        <input id="phone_number" name="phone_number" class="form-control form-control-sm mb-2" placeholder="Phone Number...">
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-group text-left">
                        <label for="email"></label>
                        E-mail:
                        <input id="email" name="email" class="form-control form-control-sm mb-2" placeholder="E-mail Address...">
                    </div>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-md">
                    <div class="form-group text-left">
                        <label for="body"></label>
                        Body:
                        <textarea id="body" name="body" class="form-control form-control-sm mb-2" placeholder="Body..."></textarea>
                    </div>
                </div>
            </div>
            <button class="btn btn-dark text-info" type="submit">Submit</button>
        </div>
    </div>
</form>