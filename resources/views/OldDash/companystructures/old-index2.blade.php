@extends('layouts.language')

@section('page-title')
    {{ __('Company Structures') }}
@endsection

<style>
    body {
        margin: 0;
        padding: 0;
        background: #fff;
        font: normal 400 14px/1.5 sans-serif;
    }

    p {
        margin: 0 0 0.5em;
    }

    em {
        font-style: normal;
        font-weight: 700;
        color: #ff4040;
    }

    .tree {
        padding: 20px;
        color: #212121;
        text-align: center;
    }

    .tree-widget {
        position: relative;
        padding: 20px 0;
        overflow-x: auto;
        direction: ltr;
    }

    .tree-structure {
        font-size: 0;
        white-space: nowrap;
    }

    .tree-node {
        display: inline-block;
        margin: 0 4px;
        padding: 0 8px;
        border-radius: 12px;
        background: #ff4040;
        font-size: 12px;
        line-height: 24px;
        color: #fff;
        transition: all 0.2s ease-in-out 0s;
        cursor: pointer;
    }

    .tree-node.active {
        background: gold;
        /* #00aa88 */
        /* outline: 2px dashed #00aa88; */
        /* outline-offset: 1px; */
    }

    .tree-branch {
        position: relative;
        margin: 0;
        padding: 0;
        list-style: none;
    }

    .tree-branch:before {
        content: '';
        position: absolute;
        top: 0;
        left: 50%;
        display: block;
        height: 17px;
        margin-left: -1px;
        border-left: 2px solid #212121;
    }

    .tree-branch:after {
        content: '';
        position: absolute;
        top: 17px;
        left: 50%;
        display: block;
        width: 8px;
        height: 8px;
        margin: -5px 0 0 -4px;
        border-radius: 50%;
        background: #212121;
    }

    .tree-item {
        position: relative;
        display: inline-block;
        padding: 40px 0 0;
        vertical-align: top;
    }

    .tree-item:before {
        content: '';
        position: absolute;
        top: 15px;
        left: 50%;
        display: block;
        height: 25px;
        margin-left: -1px;
        border-left: 2px solid #212121;
    }

    .tree-item:after {
        content: '';
        position: absolute;
        top: 15px;
        display: block;
        border-top: 2px solid #212121;
    }

    .tree-item:first-child:after {
        left: 50%;
        width: 50%;
    }

    .tree-item:not(:first-child):not(:last-child):after {
        left: 0;
        width: 100%;
    }

    .tree-item:last-child:after {
        right: 50%;
        width: 50%;
    }

    .tree-item:first-child:last-child:after {
        display: none;
    }

    .tree-description {
        margin: 30px 0 0;
        font-size: 14px;
        text-align: center;
    }

    .tree-mark {
        position: absolute;
        border: 2px dashed #212121;
        /* #00aa88 */
        transition: all 0.2s ease-in-out 0s;
    }
</style>

@section('action-button')
    <div class="all-button-box row d-flex justify-content-end">
        @can('Create Branch')
            <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6">
                <a href="#" data-url="{{ route('companystructure.create') }}?id={{ $segment }}"
                    class="btn btn-primary btn-icon-only width-auto" data-ajax-popup="true"
                    @if ($segment) data-title="{{ __('Create New position') }}"
                @else
                data-title="{{ __('Create New Structure') }}" @endif>
                    <i class="fa fa-plus"></i> {{ __('Create') }}
                </a>
            </div>
        @endcan
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5></h5>
                </div>
                <div class="ibox-content">
                    <div id="tree" class="tree">

                        <div class="tree-widget">
                            <div class="tree-structure">
                                <div class="tree-node">{{$parentTree['name'.$lang]}}</div>
                                <ul class="tree-branch">
                                    @foreach($CompanyStructures as $CompanyStructure)
                                        <li class="tree-item">
                                            <div class="tree-node">{{ $CompanyStructure['name'.$lang] }}</div>
                                            @foreach ($CompanyStructure->childrenStructures as $childstructure)
                                                @include('companystructures.child_category', ['childstructure' => $childstructure])
                                            @endforeach
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        var moveMark = function() {
            var widget = document.querySelector('.tree-widget');
            var mark = document.querySelector('.tree-mark');

            if (!mark) {
                mark = document.createElement('div');
                mark.className = 'tree-mark';
                widget.appendChild(mark);
            }

            return function(node) {
                var positionMark = node.getBoundingClientRect(),
                    positionWidget = widget.getBoundingClientRect();

                var markLeft = positionMark.left - positionWidget.left + widget.scrollLeft - 3,
                    markTop = positionMark.top - positionWidget.top + widget.scrollTop - 3;

                var markWidth = node.clientWidth + 2,
                    markHeight = node.clientHeight + 2;

                mark.style.top = markTop + 'px';
                mark.style.left = markLeft + 'px';
                mark.style.width = markWidth + 'px';
                mark.style.height = markHeight + 'px';
            };
        }();

        var initTree = function() {
            /* Settings */
            var activeClass = 'active',
                maxNodes = 3,
                maxLevels = 6,
                curLevels = 4;

            /* Helpers */
            var toggleActive = function(element) {
                element.classList.toggle(activeClass);
            };
            var countLevels = function count(item, counter) {
                counter = counter || 1;

                if (item.tagName != 'LI') {
                    return counter;
                }

                item = item.parentElement.parentElement;
                return count(item, ++counter);
            };
            var goNodeUp = function() {
                var next = current.parentElement && current.parentElement.parentElement && current.parentElement
                    .parentElement.previousElementSibling;
                if (!next) {
                    console.error('Prevented Up');
                    return false;
                }

                toggleActive(current);
                current = next;
                toggleActive(current);
            };
            var goNodeRight = function() {
                var next = current.parentElement && current.parentElement.tagName == 'LI' && current.parentElement
                    .nextElementSibling && current.parentElement.nextElementSibling.children[0];
                if (!next) {
                    console.error('Prevented Right');
                    return false;
                }

                toggleActive(current);
                current = next;
                toggleActive(current);
            };
            var goNodeDown = function() {
                var next = current.nextElementSibling && current.nextElementSibling.children[0] && current
                    .nextElementSibling.children[0].children[0];
                if (!next) {
                    console.error('Prevented Down');
                    return false;
                }

                toggleActive(current);
                current = next;
                toggleActive(current);
            };
            var goNodeLeft = function() {
                var next = current.parentElement && current.parentElement.tagName == 'LI' && current.parentElement
                    .previousElementSibling && current.parentElement.previousElementSibling.children[0];
                if (!next) {
                    console.error('Prevented Left');
                    return false;
                }

                toggleActive(current);
                current = next;
                toggleActive(current);
            };
            var createNode = function() {
                var parent = current.parentElement;
                var branch = current.nextElementSibling;
                var children = [];

                if (!branch) { // Create branch if it doesn't exist
                    if (countLevels(parent) === maxLevels) {
                        console.error('You can not create more than \"' + maxLevels + '\".');
                        return false;
                    }

                    branch = document.createElement('ul');
                    branch.className = 'tree-branch';
                    parent.appendChild(branch);
                } else {
                    children = branch.children;
                }

                if (children.length >= maxNodes) {
                    console.error('You can not create more than \"' + maxNodes +
                        '\" nodes on each level for each branch.');
                    return false;
                }

                var item = document.createElement('li');
                item.className = 'tree-item';

                var node = document.createElement('div');
                node.className = 'tree-node';
                node.innerHTML = 'Node';

                // Append created item and node into branch
                branch.appendChild(item);
                item.appendChild(node);

                // Set created new node as current
                toggleActive(current);
                current = node;
                toggleActive(current);
            };
            var deleteNode = function() {
                var item = current.parentElement;

                if (item.tagName !== 'LI') {
                    console.error('Root Node can not be removed.');
                    return false;
                }

                var branch = item.parentElement,
                    children = branch.children;
                var next = branch.previousElementSibling;

                if (children.length > 1) {
                    branch.removeChild(item);
                } else {
                    branch.parentElement.removeChild(branch);
                }

                // Set parent node as current
                current = next;
                toggleActive(current);
            };

            /* Variables */
            var first = document.querySelector('.tree-node');
            var current = first;
            toggleActive(current);
            // Set Mark to the start position
            moveMark(current);

            /* KeyUp listener */
            document.addEventListener('keyup', function(e) {
                var code = e.key; // Chrome, FF; IE
                switch (code) {
                    case 'ArrowUp':
                    case 'Up':
                        goNodeUp();
                        break;
                    case 'ArrowRight':
                    case 'Right':
                        goNodeRight();
                        break;
                    case 'ArrowDown':
                    case 'Down':
                        goNodeDown();
                        break;
                    case 'ArrowLeft':
                    case 'Left':
                        goNodeLeft();
                        break;
                    case 'Delete':
                    case 'Del':
                        deleteNode();
                        break;
                    case 'Enter':
                        createNode();
                        break;
                    default:
                        return false;
                }

                // Move Mark to the current selected Node
                moveMark(current);
            });

            // Change current Nod on click event
            var widget = document.querySelector('.tree-widget');
            widget.addEventListener('click', function(e) {
                if (e.target.className !== 'tree-node') return false;

                var node = e.target;

                toggleActive(current);
                current = e.target;
                toggleActive(current);

                moveMark(current);
            });

            // Chane Mark position on window resize event
            window.addEventListener("resize", function() {
                moveMark(current);
            });
        }

        initTree();
    </script>
@endsection
