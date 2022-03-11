@if ($errors->any())

<div class="error-container">
    <div class="error-warning">
        <p class="error-text">
            <u>{{ $errors->first() }}</u>
        </p>
    </div>
</div>

@endif