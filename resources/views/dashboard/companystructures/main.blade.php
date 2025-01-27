@extends('dashboard.layouts.master')

@section('page-title')
    {{ __('Edit Timesheet Entry') }}
@endsection

@section('content')
    <!-- Specific Version (2.2.16) -->
     <div class="container-fluid">
        <!-- Timesheet Edit Form -->
        <div class="row justify-content-center mb-4">
            <div class="col-xxl-8 col-xl-10">
                <div class="card card-rounded shadow-sm">
                    <!-- Your existing timesheet form content here -->
                </div>
            </div>
        </div>

        <!-- Company Structure Diagram -->
        <div class="row justify-content-center">
            <div class="col-xxl-11">
                <div class="card card-rounded shadow-sm">
                    <div class="card-header   text-white">
                        <h3 class="card-title mb-0">{{ __('Company Organization Chart') }}</h3>
                    </div>
                    <div class="card-body p-0">
                        <div class="d-flex justify-content-between align-items-center p-3 bg-light">
                            <div class="d-flex gap-2">
                                <button id="zoomToFit" class="btn btn-sm btn-outline-secondary">
                                    <i class="fas fa-expand"></i> {{ __('Zoom to Fit') }}
                                </button>

{{--                                <button id="expandAll" class="btn btn-sm btn-outline-secondary">--}}
{{--                                    <i class="fas fa-plus-circle"></i> {{ __('Expand All') }}--}}
{{--                                </button>--}}
{{--                                <button id="collapseAll" class="btn btn-sm btn-outline-secondary">--}}
{{--                                    <i class="fas fa-minus-circle"></i> {{ __('Collapse All') }}--}}
{{--                                </button>--}}
                            </div>
                        </div>
                        <div id="myDiagramDiv" style="height: 700px; background-color: #ffffff;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Hidden textarea for GoJS model data -->
    <textarea id="mySavedModel" style="display: none;">
        @json($structureTree, JSON_PRETTY_PRINT)
    </textarea>
@endsection

@section('script')
    <!-- Required GoJS Library -->
    <script src="https://unpkg.com/gojs/release/go.js"></script>

    <script>
        let myDiagram;

        function init() {
            const $ = go.GraphObject.make;

            myDiagram = $(go.Diagram, "myDiagramDiv", {
                initialContentAlignment: go.Spot.Center,
                "undoManager.isEnabled": true,
                "clickCreatingTool.archetypeNodeData": {
                    name: "(New person)",
                    title: "(Title)",
                    dept: "(Dept)",
                    email: "(Email)",
                    phone: "(Phone)"
                },
                layout: $(go.TreeLayout, {
                    treeStyle: go.TreeStyle.LastParents,
                    arrangement: go.TreeArrangement.Horizontal,
                    angle: 90,
                    layerSpacing: 35,
                    alternateAngle: 90,
                    alternateLayerSpacing: 35,
                    alternateAlignment: go.TreeAlignment.Bus,
                    alternateNodeSpacing: 20
                })
            });

            // Define the node template
            myDiagram.nodeTemplate =
                $(go.Node, "Spot",
                    {
                        minSize: new go.Size(280, 120),
                        selectionAdorned: true,
                        isShadowed: true,
                        shadowOffset: new go.Point(0, 2)
                    },
                    // Main body
                    $(go.Panel, "Auto",
                        $(go.Shape, "RoundedRectangle", {
                            fill: "#ffffff",
                            stroke: "#e5e7eb",
                            strokeWidth: 1
                        }),
                        $(go.Panel, "Table", { margin: 12 },
                            $(go.RowColumnDefinition, { row: 0, background: "#f3f4f6" }),
                            $(go.Panel, "Horizontal", { row: 0, columnSpan: 3 },
                                $(go.TextBlock, {
                                    font: "500 14px bold InterVariable, sans-serif",
                                    stroke: "#111827",
                                    margin: 2
                                }, new go.Binding("text", "name")),
                                $(go.TextBlock, {
                                    font: "500 12px InterVariable, sans-serif",
                                    stroke: "#15803d",
                                    margin: 2
                                }, new go.Binding("text", "dept")),
                                $(go.TextBlock, {
                                    row: 1,
                                    columnSpan: 3,
                                    font: "14px InterVariable, sans-serif",
                                    stroke: "#6b7280",
                                    margin: 4
                                }, new go.Binding("text", "title")),
                                $(go.TextBlock, {
                                    row: 2,
                                    columnSpan: 3,
                                    font: "12px InterVariable, sans-serif",
                                    stroke: "#4b5563",
                                    margin: 2
                                }, new go.Binding("text", "email")),
                                $(go.TextBlock, {
                                    row: 3,
                                    columnSpan: 3,
                                    font: "12px InterVariable, sans-serif",
                                    stroke: "#4b5563",
                                    margin: 2
                                }, new go.Binding("text", "phone")),
                                $(go.Picture, {
                                    row: 0,
                                    column: 2,
                                    rowSpan: 4,
                                    alignment: go.Spot.Right,
                                    source: "https://mwaredi.com/storage/uploads/logo/user.png",
                                    desiredSize: new go.Size(30, 30),
                                    margin: 4
                                }, new go.Binding("source", "pic")),
                                // Email Button
                                $(go.Panel, "Horizontal",
                                    {
                                        row: 2,
                                        columnSpan: 3,
                                        cursor: "pointer",
                                        toolTip: toolTip,
                                        click: (e, obj) => handleEmailClick(obj.part.data)
                                    },
                                    $(go.Shape, {
                                        geometryString: "M2 2a2 2 0 012-2h12a2 2 0 012 2v12a2 2 0 01-2 2H4a2 2 0 01-2-2V2zm3.164 1.101L8 7.664 12.836 3.1a.5.5 0 01.668.743l-5 5a.5.5 0 01-.668 0l-5-5a.5.5 0 01.668-.743z",
                                        strokeWidth: 0,
                                        desiredSize: new go.Size(16, 16),
                                        margin: new go.Margin(0, 8, 0, 0),
                                        fill: "#3b82f6"
                                    }),
                                    $(go.TextBlock, {
                                        font: "12px InterVariable, sans-serif",
                                        stroke: "#3b82f6"
                                    }, new go.Binding("text", "email"))
                                ),
                                // Phone
                                $(go.TextBlock, {
                                    row: 3,
                                    columnSpan: 3,
                                    font: "12px InterVariable, sans-serif",
                                    stroke: "#4b5563",
                                    margin: 2
                                }, new go.Binding("text", "phone")),


                            ),

                        )
                    ),
                    $(go.Shape, "RoundedLeftRectangle", {
                        alignment: go.Spot.Left,
                        width: 6,
                        strokeWidth: 0,
                        fill: "#3b82f6"
                    }),
                );

            // Link template
            myDiagram.linkTemplate =
                $(go.Link, { routing: go.Routing.Orthogonal, corner: 5 },
                    $(go.Shape, { stroke: "#9ca3af", strokeWidth: 2 })
                );

            load();
        }
        // Define contact button tooltip
        const toolTip = $(go.Adornment, "Auto",
            $(go.Shape, "RoundedRectangle", {
                fill: "#ffffff",
                stroke: "#e5e7eb",
                strokeWidth: 1
            }),
            $(go.TextBlock, {
                margin: 8,
                font: "12px InterVariable, sans-serif",
                stroke: "#111827"
            }).bind("text", "", (ad) => ad.adornedObject.part.data.email)
        );
        function load() {
            try {
                const modelData = JSON.parse(document.getElementById('mySavedModel').value);
                myDiagram.model = new go.TreeModel(modelData.nodeDataArray || []);
            } catch (error) {
                console.error('Error loading diagram data:', error);
                myDiagram.model = new go.TreeModel([]);
            }
        }

        window.addEventListener('DOMContentLoaded', () => {
            init();
            document.getElementById('zoomToFit').addEventListener('click', () => {
                myDiagram.commandHandler.zoomToFit();
            });
        });
    </script>
@endsection
