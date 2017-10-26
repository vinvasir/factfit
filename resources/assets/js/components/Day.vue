<script type="text/javascript">
	export default {
		props: ['initDayData', 'endpoint'],
		data() {
			return {
				dayData: this.initDayData
			}
		},
		methods: {
			refreshDayData() {
				axios.get(this.endpoint)
					.then(({data}) => {
						this.dayData = data;
					});
			}
		}
	}
</script>