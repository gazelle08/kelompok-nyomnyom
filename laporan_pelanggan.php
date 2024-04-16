

<table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Kode Buku</th>
                      <th>Judul Buku</th>
                      <th>Pengarang</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                        <?php
                            $query = mysqli_query($koneksi, "SELECT * FROM buku");
                            $no = 1;
                            while ($data = mysqli_fetch_array($query)) {	
                        ?>
                                <tr>
                                    <td><?php echo $no; ?>                      </td>			
                                    <td><?php echo $data['kode_buku']; ?>       </td>			
                                    <td><?php echo $data['judul_buku']; ?>      </td>			
                                    <td><?php echo $data['pengarang_buku']; ?>  </td>			
                                    <td><?php echo $data['status_buku']; ?>     </td>			
                                    <td>
                                        <a class="btn btn-warning btn-md" href="edit-buku.php?id=<?php echo $data['id_buku']; ?>">
                                        <i class="fas fa-pencil-alt"></i> Ubah Data </a> 
                                        
                                        &nbsp;
                                        &nbsp;
                                        
                                        <a class="btn btn-danger btn-md" href="proses-hapus-buku.php?id=<?php echo $data['id_buku']; ?>"
                                        onclick="return confirm('Apakah Anda yakin akan menghapus data?')">
                                        
                            
                                        <i class="fas fa-trash-alt"></i> Hapus Data</a> 
                                        
                                    </td>
                            </tr>
                            <?php
                                $no++;
                            }
                            ?>
                    
                    </tbody>
                </table>