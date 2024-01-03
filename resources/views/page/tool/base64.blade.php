<x-layout.main-sidebar title="Tools | Base64">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="pt-4 pb-4 text-center">
                    <h4>Tools Base64</h4>
                </div>
                <div class="form-floating shadow mb-3">
                    <textarea class="form-control" id="txtInput" placeholder="Input Text Here" style="height: 100px"></textarea>
                    <label for="txtInput">Input</label>
                </div>
                <div class="text-center mb-3">
                    <x-button type="button" class="btn-sm btn-outline-primary px-3" id="btnEncode">
                        Encode
                    </x-button>
                    <x-button type="button" class="btn-sm btn-outline-danger px-3" id="btnClear">
                        Clear
                    </x-button>
                    <x-button type="button" class="btn-sm btn-outline-success px-3" id="btnDecode">
                        Decode
                    </x-button>
                </div>
                <div class="form-floating  shadow">
                    <textarea class="form-control" placeholder="Output Text Here" id="txtOutput" style="height: 100px"></textarea>
                    <label for="txtOutput">Output</label>
                </div>
            </div>
        </div>
    </div>
    @push('script')
        <script type="text/javascript">
            const txtInput = document.getElementById('txtInput');
            const txtOutput = document.getElementById('txtOutput');
            // MDN
            function base64ToBytes(base64) {
                const binString = atob(base64);
                return Uint8Array.from(binString, (m) => m.codePointAt(0));
            }

            function bytesToBase64(bytes) {
                const binString = String.fromCodePoint(...bytes);
                return btoa(binString);
            }

            // // Usage
            // bytesToBase64(new TextEncoder().encode("a Ā 𐀀 文 🦄")); // "YSDEgCDwkICAIOaWhyDwn6aE"
            // new TextDecoder().decode(base64ToBytes("YSDEgCDwkICAIOaWhyDwn6aE")); // "a Ā 𐀀 文 🦄"

            const encode = () => {
                try {
                    console.log(txtInput.value);
                    txtOutput.value = bytesToBase64(new TextEncoder().encode(txtInput.value.trim()));
                } catch (error) {
                    console.log(error);
                }
            }

            const decode = () => {
                try {
                    console.log(txtInput.value);
                    let s = base64ToBytes(txtInput.value.trim());
                    console.log(s);
                    txtOutput.value = new TextDecoder().decode(base64ToBytes(txtInput.value.trim()));
                } catch (error) {
                    console.log(error);
                }
            }

            const clear = () => {
                txtInput.value = '';
                txtOutput.value = '';
            }

            document.getElementById('btnEncode').addEventListener('click', encode);
            document.getElementById('btnDecode').addEventListener('click', decode);
            document.getElementById('btnClear').addEventListener('click', clear);
        </script>
    @endpush
</x-layout.main-sidebar>
