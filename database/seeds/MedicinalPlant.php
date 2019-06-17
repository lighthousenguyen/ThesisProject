<?php

use Illuminate\Database\Seeder;

class MedicinalPlant extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('medicinal_plants')->truncate();

        $plant = new \VMN\Article\MedicinalPlant();
        $plant->commonName      = 'Ngải cứu';
        $plant->otherName       = 'Thuốc cứu, ngải diệp, nhả ngải, quá sú, cỏ linh li';
        $plant->scienceName     = 'Artemisia vulgaris';
        $plant->characteristic  = 'Là loại cỏ sống lâu năm, thân có rãnh dọc.Lá mọc so le không cuống, màu 2 mặt lá khác nhau, mặt trên nhẵn, màu lục sẫm.Mặt dưới trắng tro, có nhiều lông nhỏ';
        $plant->location        = 'châu Âu, châu Á, bắc Phi, Alaska và bắc Mỹ';
        $plant->utility         = 'Cầm máu, Giảm đau nhức, Sát trùng, kháng khuẩn, Điều hòa khí huyết';
        $plant->ratingPoint     = 3;
        $plant->thumbnailUrl    = 'ImgSample/ngai-cuu1.jpg';
        $plant->imgUrl          = json_encode(['ImgSample/ngai-cuu1.jpg','ImgSample/ngai-cuu-2.jpg','ImgSample/ngai-cuu-12.jpg']);
        $plant->author          = 'shinji';
        $plant->save();

        $plant1 = new \VMN\Article\MedicinalPlant();
        $plant1->commonName      = 'Tía tô';
        $plant1->otherName       = 'Tử tô, Tô ngạnh, Tô diệp';
        $plant1->scienceName     = 'Perilla frutescens';
        $plant1->characteristic  = 'Cây thảo, cao 0,5- 1m. Lá mọc đối, mép khía răng, mặt dưới tím tía, có khi hai mặt đều tía, nâu hay màu xanh lục có lông nhám. Hoa nhỏ màu trắng mọc thành xim co ở đầu cành, màu trắng hay tím, mọc đối, 4 tiểu nhị không thò ra ngoài hoa. Quả bế, hình cầu. Toàn cây có tinh dầu thơm và có lông. ';
        $plant1->location        = 'Ấn Độ sang Đông Á';
        $plant1->utility         = 'Tạo hưng phấn, trị cảm, nhức mỏi, ho suyễn';
        $plant1->ratingPoint     = 3;
        $plant1->thumbnailUrl    = 'ImgSample/tiato2.jpg';
        $plant1->imgUrl          = json_encode(['ImgSample/tiato2.jpg','ImgSample/tiato1.jpg','ImgSample/Cay-tia-to.jpg']);
        $plant1->author          = 'shinji';
        $plant1->save();

        $plant2 = new \VMN\Article\MedicinalPlant();
        $plant2->commonName      = 'Nhọ Nồi';
        $plant2->otherName       = 'Cỏ mực, hàn liên thảo';
        $plant2->scienceName     = 'Eclipta prostrata';
        $plant2->characteristic  = 'Cây cỏ, sống một hay nhiều năm, mọc đứng hay mọc bò, cao 30–40 cm.' .
                                    'Thân màu lục hoặc đỏ tía, phình lên ở những mấu, có lông cứng.' .
                                    'Lá mọc đối, gần như không cuống, mép khía răng rất nhỏ; hai mặt lá có lông.' .
                                    'Hoa hình đầu, màu trắng, mọc ở kẽ lá hoặc ngọn thân, gồm hoa cái ở ngoài và hoa lưỡng tính ở giữa.' .
                                    'Quả bế dài 3mm, có 2-3 vảy nhỏ, có 3 cạnh, hơi dẹt.';
        $plant2->location        = 'châu Âu, châu Á, bắc Phi, Alaska và bắc Mỹ';
        $plant2->utility         = 'Chữa chảy máu bên trong và bên ngoài, rong kinh, băng huyết, chảy máu cam, trĩ, đại tiểu tiện ra máu, nôn và ho ra máu, chảy máu dưới da;
                                    ban sởi, ho, hen, viêm họng, bỏng, nấm da, tưa lưỡi.';
        $plant2->ratingPoint     = 3;
        $plant2->thumbnailUrl    = 'ImgSample/nhonoi12.png';
        $plant2->imgUrl          = json_encode(['ImgSample/nhonoi12.png','ImgSample/nhonoi2.jpg','ImgSample/nhonoi3.jpg']);
        $plant2->author          = 'shinji';
        $plant2->save();

        $plant3 = new \VMN\Article\MedicinalPlant();
        $plant3->commonName      = 'Nghệ vàng';
        $plant3->otherName       = 'khương hoàng';
        $plant3->scienceName     = 'Curcuma longa';
        $plant3->characteristic  = 'Loại thực vật thân thảo lâu năm, mà có thể đạt đến chiều cao 1 mét.'
                                    .'Cây tạo nhánh cao, có màu vàng cam, hình trụ, và thân rễ có mùi thơm.'
                                    .'Các lá mọc xen kẽ và xếp thành hai hàng. Chúng được chia thành bẹ lá, cuống lá và phiến lá.'
                                    .'Từ các bẹ lá, thân giả được hình thành. Cuống lá dài từ 50 – 115 cm.'
                                    .'Các phiến lá đơn thường có chiều dài từ 76 – 115 cm và hiếm khi lên đến 230 cm.'
                                    .'Chúng có chiều rộng từ 38 – 45 cm và có dạng hình thuôn hoặc elip và thu hẹp ở chóp.';
        $plant3->location        = 'châu Âu, châu Á, bắc Phi, Alaska và bắc Mỹ';
        $plant3->utility         = 'Chữa các bệnh về dạ dày và gan, chữa bệnh về da: chàm, thủy đậu, bệnh zona, dị ứng, và ghẻ.';
        $plant3->ratingPoint     = 3;
        $plant3->thumbnailUrl    = 'ImgSample/nghe.jpg';
        $plant3->imgUrl          = json_encode(['ImgSample/nghe.jpg','ImgSample/nghe1.jpg','ImgSample/nghe12.png']);
        $plant3->author          = 'shinji';
        $plant3->save();

        $plant4 = new \VMN\Article\MedicinalPlant();
        $plant4->commonName      = 'Đậu đen (Đỗ đen)';
        $plant4->otherName       = 'Ô đậu, hắc đại đậu, hương xị';
        $plant4->scienceName     = 'Vigna cylindrica';
        $plant4->characteristic  = 'Toàn thân không lông. Lá kép gồm 3 lá chét mọc so le, lá chét giữa to và dài hơn lá chét hai bên. Hoa màu tím nhạt. Quả giáp dài, tròn, trong chứa 7 đến 10 hạt màu đen';
        $plant4->location        = 'châu Âu, châu Á, bắc Phi, Alaska và bắc Mỹ';
        $plant4->utility         = 'Giải độc, bổ thận, bổ huyết, chữa được cước khí, bồi bổ cơ thể.';
        $plant4->ratingPoint     = 3;
        $plant4->thumbnailUrl    = 'ImgSample/doden.jpg';
        $plant4->imgUrl          = json_encode(['ImgSample/doden.jpg','ImgSample/doden11.jpg','ImgSample/doden21.jpg']);
        $plant4->author          = 'shinji';
        $plant4->save();

        $plant5 = new \VMN\Article\MedicinalPlant();
        $plant5->commonName      = 'Đậu xanh (Đỗ xanh)';
        $plant5->otherName       = 'Lục đậu, đậu chè, má thúa kheo (Thái)';
        $plant5->scienceName     = 'Vigna radiata';
        $plant5->characteristic  = 'Cây thảo mọc đứng. Lá mọc kép 3 chia, có lông hai mặt. Hoa màu vàng lục mọc ở kẽ lá. Quả hình trụ thẳng, mảnh nhưng số lượng nhiều, có lông trong chúa hạt hình tròn hơi thuôn, kích thước nhỏ, màu xanh, ruột màu vàng, có mầm ở giữa.';
        $plant5->location        = '';
        $plant5->utility         = 'Giải độc, giải rượu,chữa lở loét, làm sáng mắt, nhuận họng, hạ huyết áp, mát buồng mật, bổ dạ dày';
        $plant5->ratingPoint     = 3;
        $plant5->thumbnailUrl    = 'ImgSample/doxanh.jpg';
        $plant5->imgUrl          = json_encode(['ImgSample/doxanh.jpg','ImgSample/doxanh12.jpg','ImgSample/doxanh1234.jpg']);
        $plant5->author          = 'shinji';
        $plant5->save();

        $plant6 = new \VMN\Article\MedicinalPlant();
        $plant6->commonName      = 'Lược vàng';
        $plant6->otherName       = 'Lan vòi, lan rũ, cây bạch tuộc, giả khóm';
        $plant6->scienceName     = 'Callisia fragrans';
        $plant6->characteristic  = 'Thân ngắn, dựng lên, lan rộng, phân nhánh, hơi ưởng ẹo cong, từ nách lá mọc ra những nhánh thân ngang bên. Lá bền dai màu xanh tươi đến màu xanh đỏ nhạt';
        $plant6->location        = '';
        $plant6->utility         = 'Giảm đau, an thần, kháng viêm, hoạt huyết, ngăn ngừa sự phát triển của nhiều loại tế bào ung thư';
        $plant6->ratingPoint     = 3;
        $plant6->thumbnailUrl    = 'ImgSample/luocvang.jpg';
        $plant6->imgUrl          = json_encode(['ImgSample/luocvang.jpg','ImgSample/luocvang1.jpg','ImgSample/luocvang121.jpg']);
        $plant6->author          = 'shinji';
        $plant6->save();

        $plant7 = new \VMN\Article\MedicinalPlant();
        $plant7->commonName      = 'Húng chanh';
        $plant7->otherName       = 'Rau tần, tần dày lá';
        $plant7->scienceName     = 'Plectranthus amboinicus';
        $plant7->characteristic  = 'Cây thân thảo, cao 20–50 cm. Phần thân sát gốc hoá gỗ. Lá mọc đối, dày cứng, giòn, mọng nước, mép khía răng tròn.'
                                    .'Thân và lá dòn, mập, lá dày có lông mịn, thơm và cay. Hai mặt lá màu xanh lục nhạt. Hoa nhỏ,4 tiểu nhị, màu tím đỏ, mọc thành bông ở đầu cành.'
                                    .'Quả nhỏ, tròn, màu nâu. Toàn cây có lông rất nhỏ và thơm như mùi chanh';
        $plant7->location        = '';
        $plant7->utility         = 'bổ phế trừ đàm, giải cảm, làm ra mồ hôi, thông khí, giải độc; trị các chứng: ho, viêm hầu họng, nghẹt mũi, cảm cúm, cổ họng khô rát, mất tiếng, nói khàn';
        $plant7->ratingPoint     = 3;
        $plant7->thumbnailUrl    = 'ImgSample/hungchanh12321.jpg';
        $plant7->imgUrl          = json_encode(['ImgSample/hungchanh12321.jpg','ImgSample/hungchanh1212.jpg','ImgSample/hungchanh12.jpg']);
        $plant7->author          = 'shinji';
        $plant7->save();

    }
}
