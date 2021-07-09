<template>
    <div class="card">
        <div class="card-body">
            <div class="d-flex">
                <h5 class="mr-auto card-title">Reservation</h5>
            </div>

            <div class="table-responsive" v-if="reserves.length > 0">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>name</th>
                            <th>email</th>
                            <th>phone</th>
                            <th>number</th>
                            <th>reservation_date</th>
                            <th class="text-center">status</th>
                            <th class="text-center">notes</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="reserve in reserves" :key="reserve.id">
                            <td>{{ reserve.id }}</td>
                            <td>{{ reserve.name }}</td>
                            <td>{{ reserve.email }}</td>
                            <td>{{ reserve.phone }}</td>
                            <td>{{ reserve.number }}</td>
                            <td>{{ reserve.reservation_date }}</td>
                            <td v-if="reserve.status !== null" class="text-center">
                                <div v-if="reserve.status == 1">confirmed</div>
                                <div v-else>rejected</div>
                            </td>
                            <td v-else class="text-center">
                                <div
                                    class="btn-icon approve-icon"
                                    title="approve"
                                    @click.prevent="confirmReserve(reserve, 1)"
                                ></div>
                                <div
                                    class="btn-icon reject-icon"
                                    title="reject"
                                    @click.prevent="confirmReserve(reserve, 0)"
                                ></div>
                            </td>
                            <td class="text-center">
                                <div v-if="reserve.notes">{{ reserve.notes }}</div>
                                <div v-else>-</div>
                            </td>
                            <td class="text-center">
                                <button
                                    class="btn btn-danger"
                                    @click.prevent="deleteReserve(reserve.id)"
                                >
                                    Delete
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="alert alert-danger" role="alert" v-else>
                <h4 class="alert-heading">Sorry!</h4>
                <hr />
                <p class="mb-0">There are no nothing to display.</p>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Reservation",
    computed: {
        reserves() {
            return this.$store.getters["reserve/all"];
        },
    },
    mounted() {
        this.loadInitialData();
    },
    methods: {
        loadInitialData() {
            this.$store
                .dispatch("reserve/getReservation")
                .then((response) => {
                    if (response.status !== 200 || response.data.error) {
                        this.displaySuccessError(response);
                    }
                })
                .catch((error) => {
                    this.displayErrors(error);
                });
        },
        deleteReserve(id) {
            this.$store
                .dispatch("reserve/deleteReserve", { id: id })
                .then((response) => {
                    if (response.status !== 200 || response.data.error) {
                        this.displaySuccessError(response);
                    } else {
                        this.displaySuccess(response);
                    }
                })
                .catch((error) => {
                    this.displayErrors(error);
                });
        },
        confirmReserve(reserve, flg) {
            this.$store
                .dispatch("reserve/updateReserve", { id: reserve.id, data: { status: flg } })
                .then((response) => {
                    if (response.status !== 200 || response.data.error) {
                        this.displaySuccessError(response);
                    } else {
                        this.displaySuccess(response);
                    }
                })
                .catch((error) => {
                    this.displayErrors(error);
                });
        },
    },
};
</script>
