<div class="about-container">
    <div class="about-row">
        <div class="about-text-container">
            <h2 class="about-h">ما چه کسانی هستیم؟</h2>
            <p class="about-text">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. A aspernatur consectetur eum magnam nulla
                rem, sapiente tenetur? A asperiores, commodi eligendi exercitationem incidunt iusto, libero neque
                nihil nostrum pariatur perspiciatis possimus quasi, rerum sed sit unde voluptatibus! Ab aut
                consectetur consequatur, dolores doloribus in necessitatibus repellendus reprehenderit ullam vel.
                Culpa ex facere illo magnam, minima necessitatibus perferendis repellat. Beatae libero mollitia
                voluptatum! Aliquam culpa cum ducimus eligendi officia possimus repellendus similique? Ab atque
                itaque saepe. Aliquam autem beatae ex id magnam obcaecati quos sed sequi totam voluptates. Amet
                architecto doloremque eligendi fugiat impedit ipsum iure molestias mollitia, placeat temporibus
                voluptatibus?
            </p>
        </div>
        <div class="officeimg-h">
            <!-- <img src="img/people/office.jpg" alt=""> -->
        </div>
    </div>
    <div class="about-row">

        <div class="about-box-container">
            <div class="member-h">
                <h2>Members</h2>
            </div>

        </div>
        <div class="about-box-container">
            <div class="about-box">
                <div class="about-box-square">
                    <img src="img/people/people1.jpg" data-src="img/people/people1.jpg" class="about-img">
                    <p class="about-title">Person 1</p>
                </div>
            </div>
            <div class="about-box">
                <div class="about-box-square">
                    <img src="img/people/people2.jpg" data-src="img/people/people2.jpg" class="about-img">
                    <p class="about-title">Person 2</p>
                </div>
            </div>
            <div class="about-box">
                <div class="about-box-square">
                    <img src="img/people/people3.jpg" data-src="img/people/people3.jpg" class="about-img">
                    <p class="about-title">Person 3</p>
                </div>
            </div>
            <div class="about-box">
                <div class="about-box-square">
                    <img src="img/people/people4.jpg" data-src="img/people/people4.jpg" class="about-img">
                    <p class="about-title">Person 4</p>
                </div>
            </div>
            <div class="about-box">
                <div class="about-box-square">
                    <img src="img/people/people5.jpg" data-src="img/people/people5.jpg" class="about-img">
                    <p class="about-title">Person 5</p>
                </div>
            </div>
            <div class="about-box">
                <div class="about-box-square">
                    <img src="img/people/people6.jpg" data-src="img/people/people6.jpg" class="about-img">
                    <p class="about-title">Person 6</p>
                </div>
            </div>
            <div class="about-box">
                <div class="about-box-square">
                    <img src="img/people/people7.jpg" data-src="img/people/people7.jpg" class="about-img">
                    <p class="about-title">Person 7</p>
                </div>
            </div>
            <div class="about-box">
                <div class="about-box-square">
                    <img src="img/people/people8.jpg" data-src="img/people/people8.jpg" class="about-img">
                    <p class="about-title">Person 8</p>
                </div>
            </div>
            <div class="about-box">
                <div class="about-box-square">
                    <img src="img/people/people9.jpg" data-src="img/people/people9.jpg" class="about-img">
                    <p class="about-title">Person 9</p>
                </div>
            </div>
        </div>
    </div>
    <div class="about-row">
        <div class="about-text-container">
            <h2 class="about-h">Published</h2>
            <p class="about-text">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. A aspernatur consectetur eum magnam nulla
                rem, sapiente tenetur? A asperiores, commodi eligendi exercitationem incidunt iusto, libero neque
                nihil nostrum pariatur perspiciatis possimus quasi, rerum sed sit unde voluptatibus! Ab aut
                consectetur consequatur, dolores doloribus in necessitatibus repellendus reprehenderit ullam vel.
                Culpa ex facere illo magnam, minima necessitatibus perferendis repellat. Beatae libero mollitia
                voluptatum! Aliquam culpa cum ducimus eligendi officia possimus repellendus similique? Ab atque
                itaque saepe. Aliquam autem beatae ex id magnam obcaecati quos sed sequi totam voluptates. Amet
                architecto doloremque eligendi fugiat impedit ipsum iure molestias mollitia, placeat temporibus
                voluptatibus?
            </p>
            <h3 class="about-h">کارفرماها:</h3>

        </div>
        <div class="about-box-container">
            @foreach ($clients as $client)
                <div class="about-box-container">
                    <div class="about-box">
                        <div class="about-box-square">
                            <img src="{{ $client->thumbnail->thumbnail_path }}" data-src="{{ $client->thumbnail->thumbnail_path }}" class="about-img">
                            @foreach ($client->projects as $project)
                                <a href="/projects/{{ $project->id }}">
                                    <p class="about-title">{{ $project->title_fa}}</p>
                                </a>
                            @endforeach


                        </div>
                    </div>
                    @endforeach
                </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            about();
        });
    </script>
