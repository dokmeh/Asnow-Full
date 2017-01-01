<div class="project-container">
    <div class="project-info-container">
        <div class="texts-masks backface">
            <h2 class="project-title">YOU</h2>


            <p class="project-story-title">Story</p>
            <div class="project-story">
                Something
            </div>
        </div>

    </div>
    <div class="switch-bt">
        <div class="open-t-bt">
            <img src="/img/all-t.svg" alt=""/>
        </div>
        <div class="open-t-bt close-bt">
            <img src="/img/c-t.svg" alt=""/>
        </div>
    </div>
    <div class="poject-img-container">
        <div class="request-form">


            <form action="/projects/request/create" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}

                <input type="radio" name="request_type" value="visit_request" checked> درخواست بازدید از محل پروژه<br>
                <input type="radio" name="request_type" value="council_request"> درخواست مشاوره با کارشناسان<br>
                <input type="radio" name="request_type" value="order_request"> درخواست ثبت سفارش پروژه<br>
                <input type="radio" name="request_type" value="follow_request"> پیگیری پروژه<br>
                <input type="radio" name="request_type" value="other"> سایر <input placeholder="توضیحات"
                                                                                   name="other_request"
                                                                                   type="text"><br>

                <input value="{{ old('name') }}" type="text" name="name">نام و نام خانوادگی <br>
                <input value="{{ old('phone') }}" type="text" name="phone">شماره تماس<br>
                                                                                       Photo:<input type="file"
                                                                                                    name="photo"><br>
                                                                                       File:<input type="file"
                                                                                                   name="file"><br>
                <br>
                <button type="submit" class="btn btn-primary">submit</button>


            </form>
            <br>
            @if (count($errors))
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

        </div>

    </div>
</div>

