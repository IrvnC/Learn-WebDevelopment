<?php
class connect_database
{
    var $host_name = "localhost";
    var $username = "root";
    var $passwd = "";
    var $db_name = "db_latihan";
    var $conn;

    function connection_DB()
    {
        $this->conn = mysqli_connect($this->host_name, $this->username, $this->passwd, $this->db_name);
    }

    function tampil_data($query)
    {

        $result = mysqli_query($this->conn, $query);
        $datas = [];
        while ($data = mysqli_fetch_assoc($result)) {
            $datas[] = $data;
        }
        return $datas;
    }

    function tambah_data($data)
    {

        $invoice = htmlspecialchars($data["invoice"]);
        $TANGGAL = htmlspecialchars($data["TANGGAL"]);
        $PEMBELI = htmlspecialchars($data["PEMBELI"]);
        $KODE_BUNGA = htmlspecialchars($data["KODE_BUNGA"]);
        $BUNGA = htmlspecialchars($data["BUNGA"]);
        $JUMLAH = htmlspecialchars($data["JUMLAH"]);
        $HARGA = htmlspecialchars($data["HARGA"]);

        $query = "INSERT INTO salesdata
                        VALUES
                        ('$invoice', '$TANGGAL', '$PEMBELI', '$KODE_BUNGA', '$BUNGA', '$JUMLAH', '$HARGA')
                    ";
        mysqli_query($this->conn, $query);

        return mysqli_affected_rows($this->conn);
    }

    function hapus_data($invoice)
    {
        mysqli_query($this->conn, "DELETE FROM salesdata WHERE invoice = $invoice");

        return mysqli_affected_rows($this->conn);
    }

    function update_data($data)
    {

        $invoice = $data["invoice"];
        $TANGGAL = htmlspecialchars($data["TANGGAL"]);
        $PEMBELI = htmlspecialchars($data["PEMBELI"]);
        $KODE_BUNGA = htmlspecialchars($data["KODE_BUNGA"]);
        $BUNGA = htmlspecialchars($data["BUNGA"]);
        $JUMLAH = htmlspecialchars($data["JUMLAH"]);
        $HARGA = htmlspecialchars($data["HARGA"]);


        $query = "UPDATE salesdata SET 
                    invoice = '$invoice',
                    TANGGAL = '$TANGGAL', 
                    PEMBELI = '$PEMBELI', 
                    KODE_BUNGA = '$KODE_BUNGA', 
                    BUNGA = '$BUNGA',
                    JUMLAH = '$JUMLAH',
                    HARGA = '$HARGA'
                WHERE invoice = $invoice
                    ";

        mysqli_query($this->conn, $query);

        return mysqli_affected_rows($this->conn);
    }
}
