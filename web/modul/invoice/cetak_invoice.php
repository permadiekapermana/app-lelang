<?php
include_once "../../../config/koneksi.php";
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Invoice Pemenang Lelang</title>

		<style>
			.invoice-box {
				max-width: 800px;
				margin: auto;
				padding: 30px;
				border: 1px solid #eee;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
				font-size: 16px;
				line-height: 24px;
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				color: #555;
			}

			.invoice-box table {
				width: 100%;
				line-height: inherit;
				text-align: left;
			}

			.invoice-box table td {
				padding: 5px;
				vertical-align: top;
			}

			.invoice-box table tr td:nth-child(2) {
				text-align: right;
			}

			.invoice-box table tr.top table td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.top table td.title {
				font-size: 45px;
				line-height: 45px;
				color: #333;
			}

			.invoice-box table tr.information table td {
				padding-bottom: 40px;
			}

			.invoice-box table tr.heading td {
				background: #eee;
				border-bottom: 1px solid #ddd;
				font-weight: bold;
			}

			.invoice-box table tr.details td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.item td {
				border-bottom: 1px solid #eee;
			}

			.invoice-box table tr.item.last td {
				border-bottom: none;
			}

			.invoice-box table tr.total td:nth-child(2) {
				border-top: 2px solid #eee;
				font-weight: bold;
			}

			@media only screen and (max-width: 600px) {
				.invoice-box table tr.top table td {
					width: 100%;
					display: block;
					text-align: center;
				}

				.invoice-box table tr.information table td {
					width: 100%;
					display: block;
					text-align: center;
				}
			}

			/** RTL **/
			.invoice-box.rtl {
				direction: rtl;
				font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
			}

			.invoice-box.rtl table {
				text-align: right;
			}

			.invoice-box.rtl table tr td:nth-child(2) {
				text-align: left;
			}
		</style>
	</head>

	<body>
		<div class="invoice-box">
			<table cellpadding="0" cellspacing="0">
				<tr class="top">
					<td colspan="2">
						<table>
							<tr>
								<td class="title">
									<img src="https://www.sparksuite.com/images/logo.png" style="width: 100%; max-width: 300px" />
								</td>

								<?php
									$id         = $_POST['id'];
									$currentDate = date('Y-m-d');
									$currentTime = date('H:i:s');
								?>

								<td>
									Invoice #: <?=$id?><br />
									Tanggal: <?=$currentDate?><br />
									Jam: <?=$currentTime?><br />
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="information">
					<td colspan="2">
						<table>
							<tr>
								<td>
									CV. Sistem Lelang Online<br />
									Cirebon, Jawa Barat<br />
									Nomor WA : 089-999-999-999
								</td>
								<?php
								$query_pelelang = "SELECT * FROM users INNER JOIN barang ON users.id_user=barang.id_user WHERE id_barang = '$id'";
								$execute_pelelang = mysqli_query($koneksi,$query_pelelang);
								$data = mysqli_fetch_array($execute_pelelang);
								?>
								<td>
									<b>Pelelang :</b><br />
									<?=$data['nama']?><br />
									No. HP / WA : <?=$data['no_hp']?>
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="heading">
					<td>Nama Pemenang</td>

					<td> </td>
				</tr>

				<tr class="details">
					<?php
					$query_pemenang = "SELECT * FROM lelang INNER JOIN users ON lelang.id_user=users.id_user WHERE id_barang = '$id' AND lelang.status='terpilih'";
					$execute_pemenang = mysqli_query($koneksi,$query_pemenang);
					$data1 = mysqli_fetch_array($execute_pemenang);
					?>
					<td><?=$data1['nama']?></td>

					<td> </td>
				</tr>

				<tr class="heading">
					<td>Item</td>

					<td>Harga</td>
				</tr>

				<tr class="item">
					<td><?=$data['nama_barang']?></td>

					<td><?=$data1['harga_tawar']?></td>
				</tr>

				<!-- <tr class="total">
					<td></td>

					<td>Total: $385.00</td>
				</tr> -->
			</table>
		</div>

		<script>
			window.print();
		</script>

	</body>
</html>
