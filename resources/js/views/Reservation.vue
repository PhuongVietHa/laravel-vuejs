<template>
    <div id="reservation" class="section">
        <!-- Backgound Image -->
        <div
            class="bg-image"
            style="background-image: url(assets/img/background03.jpg)"
        ></div>
        <!-- /Backgound Image -->

        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row justify-content-md-center">
                <!-- reservation form -->
                <div class="col-md-6 col-md-offset-1 col-sm-10 col-sm-offset-1">
                    <form class="reserve-form row" @submit.prevent="addReserve">
                        <div class="section-header text-center">
                            <h4 class="sub-title">Reservation</h4>
                            <h2 class="title white-text">Book Your Table</h2>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input
                                    v-model="reserve.name"
                                    class="input"
                                    type="text"
                                    placeholder="Name"
                                />
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone:</label>
                                <input
                                    v-model="reserve.phone"
                                    class="input"
                                    type="tel"
                                    placeholder="Phone"
                                />
                            </div>
                            <div class="form-group">
                                <label for="date">Date:</label>
                                <v-date-picker
                                    v-model="reserve.reservation_date"
                                    mode="dateTime"
                                    color="orange"
                                    :minute-increment="15"
                                    is24hr
                                >
                                    <template
                                        v-slot="{ inputValue, inputEvents }"
                                    >
                                        <input
                                            class="input"
                                            :value="inputValue"
                                            v-on="inputEvents"
                                        />
                                    </template>
                                </v-date-picker>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input
                                    v-model="reserve.email"
                                    class="input"
                                    type="email"
                                    placeholder="Email"
                                />
                            </div>
                            <div class="form-group">
                                <label for="number">Number of Guests:</label>
                                <select class="input" v-model="reserve.number">
                                    <option value="1">1 Person</option>
                                    <option value="2">2 People</option>
                                    <option value="3">3 People</option>
                                    <option value="4">4 People</option>
                                    <option value="5">5 People</option>
                                    <option value="6">6 People</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="time">Notes:</label>
                                <textarea
                                    class="input"
                                    v-model="reserve.notes"
                                ></textarea>
                            </div>
                        </div>

                        <div class="col-md-12 text-center">
                            <button class="main-button">Book Now</button>
                        </div>
                    </form>
                </div>
                <!-- /reservation form -->

                <!-- opening time -->
                <div class="col-md-4 col-md-offset-0 col-sm-10 col-sm-offset-1">
                    <div class="opening-time row">
                        <div class="section-header text-center">
                            <h2 class="title white-text">Opening Time</h2>
                        </div>
                        <ul>
                            <li>
                                <h4 class="day">Sunday</h4>
                                <h4 class="hours">8:00 am – 11:00 pm</h4>
                            </li>
                            <li>
                                <h4 class="day">Monday</h4>
                                <h4 class="hours">8:00 am – 11:00 pm</h4>
                            </li>
                            <li>
                                <h4 class="day">Tuesday</h4>
                                <h4 class="hours">8:00 am – 11:00 pm</h4>
                            </li>
                            <li>
                                <h4 class="day">Wednesday</h4>
                                <h4 class="hours">8:00 am – 11:00 pm</h4>
                            </li>
                            <li>
                                <h4 class="day">Thursday</h4>
                                <h4 class="hours">8:00 am – 11:00 pm</h4>
                            </li>
                            <li>
                                <h4 class="day">Friday</h4>
                                <h4 class="hours">Closed</h4>
                            </li>
                            <li>
                                <h4 class="day">Saturday</h4>
                                <h4 class="hours">Closed</h4>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- /opening time -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
</template>

<script>
import { DatePicker } from "v-calendar";

export default {
    name: "Reservation",
    components: {
        "v-date-picker": DatePicker,
    },
    data() {
        let date = new Date();
        date.setMinutes(0, 0, 0);

        return {
            reserve: {
                reservation_date: date,
            },
        };
    },
    methods: {
        addReserve: function (e) {
            let uri = "api/reservation/create";
            axios
                .post(uri, this.reserve)
                .then((response) => {
                    if (response.status == 200 && !response.data.error) {
                        this.displaySuccess(response);
                        e.target.reset();
                    } else {
                        this.displaySuccessError(response);
                    }
                })
                .catch((error) => {
                    this.displayErrors(error);
                });
        },
    },
};
</script>
