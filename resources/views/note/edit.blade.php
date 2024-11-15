<x-app-layout>
  <div class="note-container single-note">
    <h1 class="text-2xl py-4">Edit your note</h1>
    <form action="{{route('note.update', $note)}}" class="note" method="POST">
      @csrf
      @method('PUT')
      <textarea name="note" class="note-body" rows="10" placeholder="Enter your note here...">{{$note->note}}</textarea>
      <div class="note-buttons">
        <a href="{{route('note.index', $note)}}" class="note-cancel-button">Cancel</a>
        <button type="submit" class="note-submit-button">submit</button>
      </div>
    </form>
  </div>
</x-app-layout>