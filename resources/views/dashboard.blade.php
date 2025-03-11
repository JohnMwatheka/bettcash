<x-app-layout>
    <section>
        <div class="mt-3 rounded shadow row bg-inherit">
            <div class="flex-wrap mb-5 breadcrumb-content d-flex align-items-center justify-content-between">
                <div class="media media-card align-items-center">
                    <div class="rounded-full media-img media--img media-img-md">
                        <img class="rounded-circle" width="100" height="100"
                             src="{{ asset('assets/upload/users/' . ($userData->profile_image ?? 'default_user_img.jpeg')) }}" 
                             alt="User thumbnail image">
                    </div>
                    <div class="media-body">
                        <h2 class="section__title fs-30">
                            {{ $userData->first_name ?? 'User' }} {{ $userData->last_name ?? '' }}
                        </h2>
                        <div class="pt-2 rating-wrap d-flex align-items-center">
                            <div class="review-stars">
                                <span class="rating-number">4.4</span> <!-- Placeholder for rating -->
                                <span class="la la-star"></span>
                                <span class="la la-star"></span>
                                <span class="la la-star"></span>
                                <span class="la la-star"></span>
                                <span class="la la-star-o"></span>
                            </div>
                            <span class="pl-1 rating-total">(20,230)</span> <!-- Placeholder for reviews -->
                        </div><!-- end rating-wrap -->
                    </div><!-- end media-body -->
                </div><!-- end media -->
                
                <!-- Profile Image Upload Form -->
                <form action="{{ route('profile.upload') }}" method="POST" enctype="multipart/form-data" class="file-upload-wrap file-upload-wrap-2 file--upload-wrap">
                    @csrf
                    <input type="file" name="profile_image" class="file-upload-input" onchange="this.form.submit()">
                    <button type="submit" class="file-upload-text">
                        <i class="mr-2 la la-upload"></i>Upload Profile Image
                    </button>
                </form>
            </div>

        </div>
        
    </section>
</x-app-layout>
