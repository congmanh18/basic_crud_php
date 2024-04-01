package app;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.URL;
import javax.swing.table.DefaultTableModel;
import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;


public class Form extends javax.swing.JFrame {
    public Form() {
        initComponents();
    }

    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">                          
    private void initComponents() {

        jScrollPane1 = new javax.swing.JScrollPane();
        SV_table = new javax.swing.JTable();
        load = new javax.swing.JButton();

        setDefaultCloseOperation(javax.swing.WindowConstants.EXIT_ON_CLOSE);

        SV_table.setModel(new javax.swing.table.DefaultTableModel(
            new Object [][] {
                {null, null, null, null, null, null},
                {null, null, null, null, null, null},
                {null, null, null, null, null, null},
                {null, null, null, null, null, null}
            },
            new String [] {
                "id", "first_name", "last_name", "email", "gender", "actions"
            }
        ) {
            Class[] types = new Class [] {
                java.lang.String.class, java.lang.String.class, java.lang.String.class, java.lang.String.class, java.lang.String.class, java.lang.Object.class
            };

            public Class getColumnClass(int columnIndex) {
                return types [columnIndex];
            }
        });
        jScrollPane1.setViewportView(SV_table);

        load.setText("load");
        load.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                loadActionPerformed(evt);
            }
        });

        javax.swing.GroupLayout layout = new javax.swing.GroupLayout(getContentPane());
        getContentPane().setLayout(layout);
        layout.setHorizontalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(layout.createSequentialGroup()
                .addContainerGap(185, Short.MAX_VALUE)
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, layout.createSequentialGroup()
                        .addComponent(jScrollPane1, javax.swing.GroupLayout.PREFERRED_SIZE, 375, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addGap(169, 169, 169))
                    .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, layout.createSequentialGroup()
                        .addComponent(load)
                        .addGap(317, 317, 317))))
        );
        layout.setVerticalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(layout.createSequentialGroup()
                .addContainerGap()
                .addComponent(jScrollPane1, javax.swing.GroupLayout.PREFERRED_SIZE, 110, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addGap(18, 18, 18)
                .addComponent(load)
                .addContainerGap(25, Short.MAX_VALUE))
        );

        pack();
    }// </editor-fold>                        

    private void loadActionPerformed(java.awt.event.ActionEvent evt) {                                     

       try {
           // Tạo URL của API
           @SuppressWarnings("deprecation")
            URL url = new URL("http://localhost/crud/read_table.php");

           // Mở kết nối HTTP
           HttpURLConnection connection = (HttpURLConnection) url.openConnection();

           // Thiết lập phương thức yêu cầu là GET
           connection.setRequestMethod("GET");

           StringBuilder response;
           try ( // Đọc dữ liệu trả về từ API
                   BufferedReader reader = new BufferedReader(new InputStreamReader(connection.getInputStream()))) {
               response = new StringBuilder();
               String line;
               while ((line = reader.readLine()) != null) {
                   response.append(line);
               }
           }

           // Chuyển đổi dữ liệu JSON thành một mảng hoặc một đối tượng
           JSONArray jsonArray = new JSONArray(response.toString());

           // Xóa dữ liệu cũ trong bảng
           DefaultTableModel model = (DefaultTableModel) SV_table.getModel();
           model.setRowCount(0);

           // Thêm dữ liệu mới từ mảng JSON vào bảng
           for (int i = 0; i < jsonArray.length(); i++) {
               JSONObject jsonObject = jsonArray.getJSONObject(i);
               Object[] rowData = {
                   jsonObject.getString("id"),
                   jsonObject.getString("first_name"),
                   jsonObject.getString("last_name"),
                   jsonObject.getString("email"),
                   jsonObject.getString("gender"),
                   load // Đây là nút tải lại, có thể cần điều chỉnh nếu cần
               };
               model.addRow(rowData);
           }

       } catch (IOException | JSONException e) {
           // Xử lý lỗi khi có lỗi xảy ra trong quá trình tải dữ liệu từ API
           // Có thể hiển thị thông báo cho người dùng
           
       }
    }                                    

    /**
     * @param args the command line arguments
     */
    public static void main(String args[]) {
        java.awt.EventQueue.invokeLater(() -> {
            new Form().setVisible(true);
        });
    }

    // Variables declaration - do not modify                     
    private javax.swing.JTable SV_table;
    private javax.swing.JScrollPane jScrollPane1;
    private javax.swing.JButton load;
    // End of variables declaration                   
}
