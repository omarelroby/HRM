<li >
    <div class="tree-node">{{ $childstructure->arname }}</div>
</li>
@if ($childstructure->structures)
    <ul class="tree-branch">
        @foreach ($childstructure->structures as $childstructure)
            @include('companystructures.child_category', ['childstructure' => $childstructure])
        @endforeach
    </ul>
@endif


