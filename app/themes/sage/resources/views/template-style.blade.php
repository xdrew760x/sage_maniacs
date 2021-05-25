{{--
  Template Name: Style Guide
  --}}

  @extends('layouts.app')

  @section('content')
  <div class="section--banner bg-primary1 section-brm--hero">
    <div class="container lg:flex lg:items-center py-6">
      <h1 class="mb-0 inline-block">Style Guide</h1> <span class="inline-block lg:ml-6"> = (Hero H1)</span>
    </div>
  </div>

  <div class="section--styles bg-gray py-12">
    <div class="container flex justify-between items-start flex-row flex-wrap">
      <div class="column column-colors w-full ">
        <div class="inner flex justify-between items-center flex-row flex-wrap pb-12">
          <div class="w-full lg:w-1/4 mb-4 lg:mb-0">
            <p>Primary 1</p>
            <div class="bg-primary1 p-6">

            </div>
          </div>
          <div class="w-full lg:w-1/4 mb-4 lg:mb-0">
            <p>Primary 2</p>
            <div class="bg-primary2 p-6">

            </div>
          </div>
          <div class="w-full lg:w-1/4 mb-4 lg:mb-0">
            <p>Primary 3</p>
            <div class="bg-primary3 p-6">

            </div>
          </div>
          <div class="w-full lg:w-1/4 mb-0 lg:mb-0">
            <p>Primary 4</p>
            <div class="bg-primary4 p-6">

            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container flex justify-between items-start flex-row flex-wrap w-full">
      <!-- Headers -->
      <div class="inner w-full lg:w-1/4 mb-4">
        <p>Headers:</p>
        <h1>Header 1</h1>
        <h2>Header 2</h2>
        <h3>Header 3</h3>
        <h4>Header 4</h4>
        <h5>Header 5</h5>
        <h6>Header 6</h6>
      </div>
      <!-- Links / Body -->
      <div class="inner w-full lg:w-1/4 mb-4">
        <p class="mb-4">Links:<br>
          How far will the rabbit hole go? <a>click here to find out...</a>
        </p>

        <p class="mb-4">Paragraph:<br>
          <strong>Have you ever had a dream Neo,</strong> that you were so sure was real? What if you were unable to wake from that dream, Neo? How would you know the difference between the dream world and the real world? What you know you can't explain, but you feel it. <br><br>Span:<br> <span>You've felt it your entire life, that there's something wrong with the world. You don't know what it is, but it's there, like a splinter in your mind, driving you mad.</span>
        </p>

        <small>Small Text example</small>
      </div>

      <!-- Buttons -->
      <div class="inner w-full lg:w-1/4 mb-4 lg:pl-4">
        <p>Buttons:</p>
        <a href="#" class="button button--primary">book now</a>
        <a href="#" class="button button--secondary">book now</a>
        <a href="#" class="button button--third">book now</a>
        <a href="#" class="button button--fourth">book now</a>
      </div>

      <!-- List -->
      <div class="inner w-full lg:w-1/4 mb-4">
        <p>List:</p>
        <ul>
          <li>wake up neo</li>
          <li>wake up neo</li>
          <li>wake up neo</li>
          <li>wake up neo</li>
          <li>wake up neo</li>
          <li>wake up neo</li>
          <li>wake up neo</li>
          <li>wake up neo</li>
        </ul>
      </div>
    </div>
  </div>
</div>

@endsection
