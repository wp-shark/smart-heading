const Markup = ({ attributes }) => {

	const { headingText, descriptionText, headingTitleSize, headingTitleColor, headingTitleMarginBottom, headingTitleAlignment, descriptionTextSize, descriptionTextColor, descriptionTextMarginBottom, descriptionTextAlignment } = attributes;

	const headingStyle = {
		fontSize: headingTitleSize ? `${headingTitleSize}px` : '16px',
		color: headingTitleColor || '#000000',
		marginBottom: headingTitleMarginBottom ? `${headingTitleMarginBottom}px` : '0px',
		textAlign: headingTitleAlignment || 'left'
	};

	const descriptionStyle = { 
		fontSize: descriptionTextSize ? `${descriptionTextSize}px` : '16px',
		color: descriptionTextColor || '#000000',
		marginBottom: descriptionTextMarginBottom ? `${descriptionTextMarginBottom}px` : '0px',
		textAlign: descriptionTextAlignment || 'left'
	};

	return (
		<div className="smt-heading-wrapper">
			<span className="smt-heading-title" style={headingStyle}>{attributes?.headingText}</span>
			<span className="smt-heading-description" style={descriptionStyle}>{attributes?.descriptionText}</span>
		</div>
	);
};

export default Markup;