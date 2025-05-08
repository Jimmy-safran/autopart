
/*Plus Cross Copy Paste*/
(function () {

    const { __ } = wp.i18n;

    const Json_error = __("Warning: The data is not in JSON format", "tpebl");
    const elementor_json_error = __('Warning: This is not a valid Elementor JSON. "tpelecode" not found.', "tpebl");

    var g = ["section", "column", "widget", "container"],
        a = [];
    elementor.on("preview:loaded", function () {
        g.forEach(function (b, e) {
            elementor.hooks.addFilter("elements/" + g[e] + "/contextMenuGroups", function (b, h) {
                return (
                    a.push(h),
                    b.push({
                        name: "plus_" + g[e],
                        actions: [
                            {
                                name: "tp_plus_copy",
                                title: "Plus Copy",
                                icon: "eicon-copy",
                                callback: function () {
                                    var b = {};

                                    if (g[e] === "widget") {
                                        b.tpeletype = h.model.get("widgetType");
                                    } else {
                                        b.tpeletype = null;
                                    }

                                    b.tpelecode = h.model.toJSON();

                                    console.log(b);

                                    // Create a textarea element
                                    var textarea = document.createElement('textarea');
                                        textarea.value = JSON.stringify(b);

                                    // Append textarea, select its content, copy, and remove it
                                    document.body.appendChild(textarea);
                                    textarea.select();
                                    document.execCommand('copy');
                                    document.body.removeChild(textarea);

                                },
                            },
                            {
                                name: "tp_plus_paste",
                                title: "Plus Paste",
                                icon: "eicon-import-kit",
                                callback: function () {

                                    navigator.permissions.query({ name: "clipboard-read" }).then(permissionStatus => {
                                        var clipboardAllowed = (permissionStatus.state !== "denied");

                                        if (!clipboardAllowed) {

                                            var existingDialog = document.getElementById('tpae-paste-area-dialog');
                                            if (existingDialog) {
                                                existingDialog.parentNode.removeChild(existingDialog);
                                            }

                                            var tpae_paste = document.querySelector('#tpae-paste-area-input');
                                            if (!tpae_paste) {

                                                var container = document.createElement('div'),
                                                    paragraph = document.createElement('p');

                                                    paragraph.innerHTML = __("Please grant clipboard permission for smoother copying and pasting.", "tpebl");

                                                var inputArea = document.createElement('input');
                                                    inputArea.id = 'tpae-paste-area-input';
                                                    inputArea.type = 'text';
                                                    inputArea.setAttribute('autocomplete', 'off');
                                                    inputArea.setAttribute('autofocus', 'autofocus');
                                                    inputArea.focus();

                                                    container.appendChild(paragraph);
                                                    container.appendChild(inputArea);

                                                inputArea.addEventListener('paste', async function (event) {
                                                    event.preventDefault();
                                                    var pastedData = event.clipboardData.getData("text");
                                                    console.log(pastedData);

                                                    if (tpae_isJSON(pastedData) == false) {
                                                        alert(Json_error);
                                                        return;
                                                    }

                                                    var parsedData = JSON.parse(pastedData);

                                                    if (!parsedData.tpelecode || typeof parsedData !== 'object') {
                                                        alert(elementor_json_error);
                                                        return;
                                                    }

                                                    tpae_manage_paste(parsedData, h);

                                                    var existingDialog = document.getElementById('tpae-paste-area-dialog');
                                                    if (existingDialog) {
                                                        existingDialog.parentNode.removeChild(existingDialog);
                                                    }
                                                });

                                                let getSystem = '';
                                                if (navigator.userAgent.indexOf('Mac OS X') != -1) {
                                                    getSystem = 'Command'
                                                } else {
                                                    getSystem = 'Ctrl'
                                                }

                                                var tpDilouge = elementorCommon.dialogsManager.createWidget('lightbox', {
                                                    id: 'tpae-paste-area-dialog',
                                                    headerMessage: `${getSystem} + V`,
                                                    message: container,
                                                    position: {
                                                        my: 'center center',
                                                        at: 'center center'
                                                    },
                                                    onShow: function onShow() {
                                                        inputArea.focus()
                                                        tpDilouge.getElements('widgetContent').on('click', function () {
                                                            inputArea.focus()
                                                        });
                                                    },
                                                    closeButton: true,
                                                    closeButtonOptions: {
                                                        iconClass: 'eicon-close'
                                                    },
                                                });

                                                tpDilouge.show();
                                            }
                                        } else {

                                            navigator.clipboard.readText().then(function (pastedData) {
                                                if (tpae_isJSON(pastedData) == false) {
                                                    alert(Json_error);
                                                    return;
                                                }

                                                var parsedData = JSON.parse(pastedData);

                                                if (!parsedData.tpelecode || typeof parsedData !== 'object') {
                                                    alert(elementor_json_error);
                                                    return;
                                                }

                                                tpae_manage_paste(parsedData, h);

                                            }).catch(function (err) {
                                                console.error("Error reading clipboard data: " + err);
                                            });

                                        }
                                    });


                                },
                            },
                        ],
                    }),
                    b
                );
            });
        });
    });

    const tpae_manage_paste = async (parsedData, h) => {

        var widgets_name = await tpae_get_widgetsname(parsedData.tpelecode);

        let response = await jQuery.ajax({
            url: theplus_cross_cp.ajax_url,
            method: "POST",
            data: {
                nonce: theplus_cross_cp.nonce,
                action: "tpae_live_paste",
                type: "tpae_enable_widget",
                widgets_name: widgets_name,
            }
        });

        if (response.success == false) {
            alert(response.message);
            return;
        }

        await tpae_widgets_load();

        if (response.success) {

            await tpae_createWidgetElements(parsedData, h);

            elementor.saver.update.apply().then(function () {
                // window.location.reload();
            });
        }
    }

    /**
     * This Function are used for get all widgets list.
     */
    const tpae_get_widgetsname = async (obj, widgetTypes = []) => {

        if (obj.hasOwnProperty("widgetType") && obj.widgetType) {
            widgetTypes.push(obj.widgetType);
        }

        if (Array.isArray(obj.elements)) {
            obj.elements.forEach(element =>
                tpae_get_widgetsname(element, widgetTypes));
        }

        return [...new Set(widgetTypes)];
    }

    const tpae_widgets_load = async () => {
        const Oa = (e) => {
            return new Promise((resolve, reject) => {
                const r = document.createElement(e.nodeName);
                // Set attributes like id, rel, src, href, type
                ["id", "rel", "src", "href", "type"].forEach(attr => {
                    if (e[attr]) {
                        r[attr] = e[attr];
                    }
                });
                // Append inner HTML content if present
                if (e.innerHTML) {
                    r.appendChild(document.createTextNode(e.innerHTML));
                }
                // Resolve on load, reject on error
                r.onload = () => {
                    resolve(true);
                };
                r.onerror = () => {
                    reject(new Error("Error loading asset."));
                };
                // Append to document body
                document.body.appendChild(r);
                // Resolve immediately for <link> or <script> without src
                if ((r.nodeName.toLowerCase() === "link" || (r.nodeName.toLowerCase() === "script" && !r.src))) {
                    resolve();
                }
            });
        }
        const fetchAndProcessData = async () => {
            await fetch(document.location.href, { parse: false })
                .then(response => response.text())
                .then(text => {
                    // Step 2: Parse the HTML response
                    const parser = new DOMParser();
                    const doc = parser.parseFromString(text, 'text/html');
                    // Step 3: Define IDs to filter
                    const idsToInclude = ['wp-blocks-js-after', 'plus-editor-css-css', 'plus-editor-js-js', 'elementor-editor-js-before'];
                    // Step 4: Select and filter elements
                    const elements = Array.from(doc.querySelectorAll('link[rel="stylesheet"],script')).filter(element => {
                        return element.id && (idsToInclude.includes(element.id) || !document.getElementById(element.id));
                    });
                    // Step 5: Process each element (assuming Oa is a defined function)
                    return elements.reduce((promise, element) => {
                        return promise.then(() => Oa(element));
                    }, Promise.resolve());
                })
                .catch(error => {
                    console.error('Error fetching or processing data:', error);
                });
        }
        await fetchAndProcessData();
        if (typeof elementor !== 'undefined') {
            elementor.addWidgetsCache(elementor.getConfig().initial_document.widgets);
        }
    }

    const tpae_createWidgetElements = async (data, element) => {
        var targetElement = element,
            targetElementType = element.model.get("elType"),
            sourceElementType = data.tpelecode.elType,
            sourceElementData = data.tpelecode,
            sourceElementJson = JSON.stringify(sourceElementData);

        var containsImage = /\.(jpg|png|jpeg|gif|svg)/gi.test(sourceElementJson),
            elementModel = { elType: sourceElementType, settings: sourceElementData.settings },
            targetContainer = null,
            insertOptions = { index: 0 };

        if (sourceElementType === "section" || sourceElementType === "container") {
            elementModel.elements = tpae_parseElements(sourceElementData.elements);
            targetContainer = elementor.getPreviewContainer();
        } else if (sourceElementType === "column") {
            elementModel.elements = tpae_parseElements(sourceElementData.elements);
            if (targetElementType === "section" || targetElementType === "container") {
                targetContainer = targetElement.getContainer();
            } else if (targetElementType === "column") {
                targetContainer = targetElement.getContainer().parent;
                insertOptions.index = targetElement.getOption("_index") + 1;
            } else if (targetElementType === "widget") {
                targetContainer = targetElement.getContainer().parent.parent;
                insertOptions.index = targetElement.getContainer().parent.view.getOption("_index") + 1;
            }
        } else if (sourceElementType === "widget") {
            elementModel.widgetType = data.tpeletype;
            targetContainer = targetElement.getContainer();
            if (targetElementType === "section" || targetElementType === "container") {
                targetContainer = targetElement.children.findByIndex[0].getContainer();
            } else if (targetElementType === "column") {
                targetContainer = targetElement.getContainer();
            } else if (targetElementType === "widget") {
                targetContainer = targetElement.getContainer().parent;
                targetElement.index = targetElement.getOption("_index") + 1;
                insertOptions.index = targetElement.getOption("_index") + 1;
            }
        }

        var createdElement = $e.run("document/elements/create", {
            model: elementModel,
            container: targetContainer,
            options:
                insertOptions
        });

        if (containsImage) {
            jQuery.ajax({
                url: theplus_cross_cp.ajax_url,
                method: "POST",
                data: {
                    nonce: theplus_cross_cp.nonce,
                    action: "plus_cross_cp_import",
                    copy_content: sourceElementJson
                }
            }).done(function (response) {
                if (response.success) {
                    var importedData = response.data[0];
                    elementModel.elType = importedData.elType;
                    elementModel.settings = importedData.settings;
                    if (elementModel.elType === "widget") {
                        elementModel.widgetType = importedData.widgetType;
                    } else {
                        elementModel.elements = importedData.elements;
                    }
                    $e.run("document/elements/delete", { container: createdElement });
                    $e.run("document/elements/create", { model: elementModel, container: targetContainer, options: insertOptions });
                }
            });
        }
    }

    function tpae_parseElements(elements) {
        return elements ? elements.map(el => ({ ...el })) : [];
    }

    function tpae_isJSON(str) {
        try {
            JSON.parse(str);
            return true;
        } catch (e) {
            return false;
        }
    }
})(jQuery);