<template>
    <div class="col-12">
        <div class="card text-right">
            <div class="card-header">
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="stock_id">الموردين</label>
                        <select
                            class="form-control form-control-sm"
                            name="supplier_id"
                            id="supplier_id"
                            v-model="supplier_id"
                        >
                            <option
                                v-for="supplier in suppliers"
                                :value="supplier.id"
                                :key="supplier.id"
                            >
                                {{ supplier.name }}</option
                            >
                        </select>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="payment_id">نوع الفاتوره</label>
                        <select
                            class="form-control form-control-sm"
                            name="payment_id"
                            id="payment_id"
                            v-model="invoice_type"
                        >
                            <option value="invoice">مشتريات</option>
                            <option value="refund">مرتجع مشتريات</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="stock_id">المخزن</label>
                        <select
                            class="form-control form-control-sm"
                            name="stock_id"
                            id="stock_id"
                            v-model="stock_id"
                        >
                            <option
                                v-for="stock in stocks"
                                :value="stock.id"
                                :key="stock.id"
                            >
                                {{ stock.name }}</option
                            >
                        </select>
                    </div>

                    <div class="form-group col-md-4 mr-auto">
                        <label for="product_name">اسم المنتج</label>
                        <input
                            id="product_name"
                            @keyup="get_product_name"
                            type="text"
                            v-model="product_name"
                            class="form-control"
                            placeholder="اسم الصنف"
                        />
                        <ul style="position: absolute;" class="list-group">
                            <li
                                class="list-group-item"
                                @click="select_product(product)"
                                v-for="product in products"
                                :key="product.id"
                            >
                                {{ product.name }}
                            </li>
                            <!-- <li class="list-group-item"  @click="create_product()">اضافة منتج</li> -->
                        </ul>
                    </div>

                    <div class="form-group col-md-4 mr-auto">
                        <label for="invoice_number">رقم الفاتوره</label>
                        <input
                            id="invoice_number"
                            type="text"
                            v-model="invoice_number"
                            class="form-control"
                            placeholder="رقم الفاتوره"
                        />
                    </div>
                    <div class="form-group col-md-4 mr-auto">
                        <label for="product_barcode">الباركود</label>
                        <input
                            id="product_barcode"
                            ref="product_barcode"
                            @keyup.enter="get_product_barcode"
                            type="text"
                            v-model="product_barcode"
                            class="form-control"
                            placeholder="الباركود"
                        />
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>الصنف</th>
                            <th>السعر</th>
                            <th>الكميه</th>
                            <th>الاجمالى</th>
                            <th>ضبط</th>
                        </tr>
                    </thead>
                    <tbody id="product">
                        <tr v-for="product in products_table" :key="product.id">
                            <td>{{ product.name }}</td>
                            <td>{{ product.price }}</td>
                            <td>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <img
                                                src="/image/add.png"
                                                @click="in_crease(product)"
                                        /></span>
                                    </div>
                                    <input
                                        type="text"
                                        @keyup="qyt($event, product)"
                                        class="form-control col-1 text-center"
                                        :value="product.qyt"
                                    />
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <img
                                                src="/image/minus.png"
                                                @click="de_crease(product)"
                                        /></span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                {{ parseFloat(product.subtotal).toFixed(2) }}
                            </td>
                            <td>
                                <img
                                    src="/image/delete.png"
                                    @click="remove_form_table(product)"
                                />
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card text-right">
            <div class="card-header">
                <h3>الدفع والماليه</h3>
            </div>
            <div class="card-body" style="background-color: floralwhite;">
                <div class="col-md-12">
                    <div class="row">
                        <!-- accepted payments column -->
                        <div class="col-6">
                            <div class="row">
                                <div class="col-12">
                                    <h3>التخفيض :</h3>

                                    <div class="form-check-inline form-check">
                                        <input
                                            v-model="discount"
                                            class="form-check-input"
                                            type="radio"
                                            value="percentage"
                                            checked
                                            id="percentage"
                                        />
                                        <label
                                            class="form-check-label"
                                            for="percentage"
                                        >
                                            نسبه مؤيه
                                        </label>
                                    </div>
                                    <div class="form-check-inline form-check">
                                        <input
                                            v-model="discount"
                                            class="form-check-input"
                                            type="radio"
                                            value="fixed"
                                            id="fixed"
                                        />
                                        <label
                                            class="form-check-label"
                                            for="fixed"
                                        >
                                            مبلغ ثابت
                                        </label>
                                    </div>

                                    <br>
                                    <br>
                                    <div class=" col-12 form-group">
                                        <input
                                            type="text"
                                            class="form-control"
                                            v-model="discount_value"
                                        />
                                    </div>
                                </div>

                                <div class="form-group col-12">
                                    <label for="payment_id">طريقه الدفع</label>
                                    <select
                                        class="form-control form-control-sm"
                                        name="payment_id"
                                        id="payment_id"
                                        v-model="payment_method"
                                    >
                                        <option
                                            v-for="payment in payments"
                                            :value="payment.id"
                                            :key="payment.id"
                                        >
                                            {{ payment.name }}</option
                                        >
                                    </select>
                                </div>
                                <div class="form-group col-12">
                                    <div class="form-group">
                                        <label>
                                            <input
                                                type="checkbox"
                                                class="flat-red"
                                                v-model="taxes_included"
                                                checked
                                            />
                                            شامل الضريبه
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- /.col -->
                        <div class="col-6">
                            <div class="table-responsive">
                                <table class="table table-bordered ">
                                    <!-- <table class="table table-striped table-inverse table-responsive"> -->
                                    <tr>
                                        <th>اجمالي الفاتورة :</th>
                                        <td>SDG {{ total.toFixed(2) }}</td>
                                    </tr>
                                    <tr>
                                        <th>الخصم:</th>
                                        <td>SDG {{ discount_amount }}</td>
                                    </tr>
                                    <tr>
                                        <th>الاجمالي بعد الخصم :</th>
                                        <td>
                                            SDG
                                            {{
                                                total.toFixed(2) -
                                                    discount_amount
                                            }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>الضريبه:</th>
                                        <td>SDG {{ vat }}</td>
                                    </tr>

                                    <tr>
                                        <th>صافي الفاتورة:</th>
                                        <td>SDG {{ full_total }}</td>
                                    </tr>


                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer text-muted">
                    <div class="col-md-12">
                        <div class="form-group">
                            <button
                                @click="create_purchase_invoice"
                                class="btn btn-lg btn-info"
                            >
                                انشاء فاتوره
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
const Toast = Swal.mixin({
    toast: true,
    showConfirmButton: false,
    timer: 3000
});

import Customer from "./CustomerComponent";

export default {
    components: {
        Customer
    },
    mounted() {
        this.get_stock_name();
        this.get_supplier_name();
        this.get_payments();
    },
    data() {
        return {
            product_name: "",
            invoice_number: "",
            product_barcode: "",
            products: [],
            products_list: [],
            products_table: [],

            payments: [],
            account_id: 1,
            invoice_type: 'invoice',

            amount_paid: 0,
            taxes_included: true,

            stocks: [],
            stock_id: 0,

            suppliers: [],
            supplier_id: 0,

            payment_method: 1,

            discount: "percentage",
            discount_value: 0,

            total: 0,
            vat_total: 0
        };
    },
    methods: {
        qyt(event, product) {
            let value = event.target.value;
            if (value < 1) {
                this.remove_form_table(product);
                return;
            }

            let obj;
            // التاكد من عدمlogin وجود المنتج فى القائمه
            for (let i = 0; i < this.products_table.length; i++) {
                if (this.products_table[i].id === product.id) {
                    obj = this.products_table.find(o => o.id === product.id);

                    var qyt = value - obj.qyt;
                    this.total -= parseFloat(obj.subtotal);
                    obj.qyt = value;
                    obj.subtotal = parseFloat(obj.price) * parseFloat(obj.qyt);

                    this.total += parseFloat(obj.subtotal);
                }
            }
        },
        create_purchase_invoice() {
            // validtions
            if (this.supplier_id == 0 || this.supplier_id == "") {
                swal("عفوا!", "الرجاء اختيار المورد اولا!", "warning");
                return;
            } else if (this.stock_id == 0 || this.stock_id == "") {
                swal("عفوا!", "الرجاء اختيار المخزن اولا!", "warning");
                return;
            } else if (this.invoice_number == "") {
                this.invoice_number = 0;
            } else if (this.products_table.length == 0 || this.total == "") {
                swal("عفوا!", "لايمكن انشاء فاتوره بدون منتجات!", "warning");
                return;
            }
            axios
                .get("/api/create_purchase_invoice", {
                    params: {
                        products_table: this.products_table,
                        total: this.total,
                        vat: this.vat,
                        invoice_number: this.invoice_number,
                        stock_id: this.stock_id,
                        discount_amount: this.discount_amount,
                        supplier_id: this.supplier_id,
                        invoice_type: this.invoice_type,
                        payment_method: this.payment_method
                    }
                })
                .then(response => {
                    if (response.status === 200) {
                        console.log(response.data);
                        this.products_table = [];
                        this.total = 0;
                        this.supplier_id = 0;
                        this.discount_value = 0;
                        this.vat = 0;
                        // this.total = "";
                        this.invoice_number = null;
                        swal("رائع!", "تم انشاء الفاتورة بنجاح", "success");
                    }
                    if (response.status === 204) {
                        alert("الرجاء وضع منتجات اولا");
                    }
                })
                .catch(error => {});
        },
        get_product_name() {
            axios
                .get("/submit", { params: { product_name: this.product_name } })
                .then(response => {
                    this.products = response.data;
                })
                .catch(error => {
                    if (error.response.status === 422) {
                        console.log("");
                    }
                });
        },
        get_payments() {
            axios
                .get("/api/payments")
                .then(response => {
                    this.payments = response.data;
                })
                .catch(error => {});
        },
        get_stock_name() {
            axios
                .get("/api/stocks")
                .then(response => {
                    console.log("ahmed hme : " + response);
                    this.stocks = response.data;
                })
                .catch(error => {
                    if (error.response.status === 422) {
                        console.log("");
                    }
                });
        },
        get_supplier_name() {
            axios
                .get("/api/suppliers")
                .then(response => {
                    this.suppliers = response.data;
                })
                .catch(error => {
                    if (error.response.status === 422) {
                        console.log("");
                    }
                });
        },

        get_product_barcode() {
            axios
                .get("/api/get_product_barcode", {
                    params: { product_barcode: this.product_barcode }
                })
                .then(response => {
                    if (!response.data.barcode) {
                        swal("تحديث!", "عفوا المنتج غير موجود!", "warning");
                        this.product_barcode = "";
                        this.$refs.product_barcode.focus();
                    } else {
                        this.select_product(response.data);
                        this.product_barcode = "";
                    }
                })
                .catch(error => {
                    if (error.response.status === 422) {
                        console.log("");
                    }
                });
        },

        select_product(product) {
            let product_exe = false;
            let obj;
            // التاكد من عدم وجود المنتج فى القائمه
            for (let i = 0; i < this.products_table.length; i++) {
                if (this.products_table[i].id === product.id) {
                    product_exe = true;
                    obj = this.products_table.find(o => o.id === product.id);
                    obj.qyt += 1;
                    obj.subtotal = obj.price * obj.qyt;
                }
            }

            // console.log(obj);
            // return;
            if (product_exe !== true) {
                this.products_table.push({
                    id: product.id,
                    vat: product.vat,
                    name: product.name,
                    price: product.purchase_price,
                    qyt: 1,
                    subtotal: product.purchase_price
                });
            }

            this.total =
                parseFloat(this.total) + parseFloat(product.purchase_price);
            this.products = null;
            this.product_name = "";
        },
        /**
         * حذف المنتج من الفاتوره
         * @param product
         */
        remove_form_table(product) {
            // swal("هل انت متاكد من حذف المنتج!", "error");
            // تحديث السعر الكلى
            this.total = parseFloat(this.total) - parseFloat(product.subtotal);

            // جلب الاندكس بتاع المنتج فى الجدول
            let id = this.products_table.indexOf(product);

            // حذف المنتج من الجدول
            this.products_table.splice(id, 1);
        },
        in_crease(product) {
            let obj;
            // التاكد من عدمlogin وجود المنتج فى القائمه
            for (let i = 0; i < this.products_table.length; i++) {
                if (this.products_table[i].id === product.id) {
                    obj = this.products_table.find(o => o.id === product.id);
                    obj.qyt = parseInt(obj.qyt) + 1;
                    obj.subtotal = parseFloat(obj.price) * parseFloat(obj.qyt);
                    obj.sub_vat = parseFloat(obj.vat) * parseFloat(obj.qyt);
                }
            }
            this.total = parseFloat(this.total) + parseFloat(obj.price);
            this.vat_total = parseFloat(this.vat_total) + parseFloat(obj.vat);
        },
        de_crease(product) {
            let obj;
            // التاكد من عدم وجود المنتج فى القائمه
            for (let i = 0; i < this.products_table.length; i++) {
                if (this.products_table[i].id === product.id) {
                    obj = this.products_table.find(o => o.id === product.id);
                    if (obj.qyt > 1) {
                        obj.qyt -= 1;
                        obj.subtotal =
                            parseFloat(obj.price) * parseFloat(obj.qyt);
                        this.vat_total =
                            parseFloat(this.vat_total) + parseFloat(obj.vat);
                        this.total -= parseFloat(obj.price);
                    }
                }
            }
        },
        create_product() {
            alert("create_product");
        }
    },
    computed: {
        bill: function() {
            let x;

            x = this.full_total - this.amount_paid;
            return parseFloat(x).toFixed(2);
        },
        full_total: function() {
            let x;
            x = this.total - this.discount_amount + parseFloat(this.vat);
            return parseFloat(x).toFixed(2);
        },
        discount_amount: function() {
            if (this.discount == "percentage") {
                let x;
                x = this.total * (this.discount_value / 100);
                return parseFloat(x).toFixed(2);
            } else {
                return this.discount_value;
            }
        },
        vat: function() {
            let total_after_discount;
            total_after_discount = this.total - this.discount_amount;
            this.vat_total = (total_after_discount * 0.15).toFixed(2);
            if (this.taxes_included) return this.vat_total;
            else return 0;
        },
        vat_total_c: function() {
            let x;
            x = parseFloat(this.total) + parseFloat(this.vat);
            return x.toFixed(2);
        },
        invoice_sum: function() {
            let x;
            x = parseFloat(this.total) + parseFloat(this.vat);
            return x.toFixed(2);
        }
    }
};
</script>
<style lang="stylus" scoped></style>
